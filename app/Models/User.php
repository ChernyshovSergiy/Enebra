<?php

namespace App\Models;

use App\Traits\Relations\HasMany\Images;
use App\Traits\Relations\HasMany\InfPages;
use App\Traits\Relations\HasMany\Languages;
use App\Traits\Relations\HasMany\UserFAQAnswers;
use App\Traits\Relations\HasMany\UserFaqQuestions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Translation\HasLocalePreference;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $parent_referral_id
 * @property string|null $citizen_country_alpha2_code
 * @property int|null $biometric_photo_id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $first_name_en
 * @property string|null $last_name_en
 * @property int|null $sex_id
 * @property string|null $birth_country_alpha2_code
 * @property int|null $document_id
 * @property string|null $document_number
 * @property int|null $birth_day
 * @property int|null $birth_month
 * @property string|null $birth_year
 * @property string|null $phone
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $login
 * @property string $password
 * @property int|null $avatar_id
 * @property string|null $remember_token
 * @property string $status
 * @property string $referral_id
 * @property int $language_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $avatar
 * @property-read int|null $avatar_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Faq_answer[] $faq_answers
 * @property-read int|null $faq_answers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Faq_question[] $faq_questions
 * @property-read int|null $faq_questions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Language[] $language
 * @property-read int|null $language_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Inf_page[] $page
 * @property-read int|null $page_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAvatarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereBiometricPhotoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereBirthCountryAlpha2Code($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereBirthDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereBirthMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereBirthYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCitizenCountryAlpha2Code($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDocumentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereDocumentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereFirstNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLastNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereParentReferralId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereReferralId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereSexId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements MustVerifyEmail, HasLocalePreference
{
    use Notifiable,
        Languages,
        InfPages,
        Images,
        UserFAQAnswers,
        UserFaqQuestions;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function preferredLocale()
    {
        return $this->locale;
    }

    public function getUserNames() :array
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $lang_id = Language::whereSlug($locale)->first();
        $users = self::all();
        $user_names = [];
        foreach($users as $user){
            if ($lang_id->id === $user->language_id){
                $user_names[$user->id] = $user->first_name. ' '. $user->last_name;
            } else{
                $user_names[$user->id] = $user->first_name_en. ' '. $user->last_name_en;
            }
        }
        return $user_names;
    }

    public static function getFullName($id) :string
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $lang_id = Language::whereSlug($locale)->first();
        $user = self::find($id);
        if ($lang_id->id === $user->language_id){
            return $user->first_name. ' '. $user->last_name;
        }
        return $user->first_name_en. ' '. $user->last_name_en;


    }
}
