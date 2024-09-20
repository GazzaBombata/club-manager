<?php

namespace App\Actions\Fortify;

use App\Enums\AttendanceStatus;
use App\Enums\MeetingStatus;
use App\Models\Attendance;
use App\Models\Club;
use App\Models\ClubUserAffiliation;
use App\Models\Meeting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();


        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);


        if (isset($input['tenant_id'])) {
            $club = Club::find($input['tenant_id']);

            if ($club) {
                // Assuming you have a relation like $user->tenants() or similar
                ClubUserAffiliation::create([
                    'club_id' => $club->id,
                    'user_id' => $user->id,
                    'status' => 'Member',
                    'user_contact_email' => $user->email,
                    'user_contact_phone' => '',
                    'joined_at' => Carbon::now(),
                ]);

                $meetings = Club::find($club->id)->meetings->where('editable_until', '>', Carbon::now())->where('status', '=' , MeetingStatus::Published->value)->where('commission_id', '=', null);

                foreach ($meetings as $meeting) {
                    Attendance::create([
                        'meeting_id' => $meeting->id,
                        'user_id' => $user->id,
                        'payment_id' => null,
                        'status' => AttendanceStatus::Invited,
                        'is_compulsory' => true,
                    ]);
                }
            }
        }

        return $user;
    }
}
