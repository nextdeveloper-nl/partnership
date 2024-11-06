<?php

namespace NextDeveloper\Partnership\Http\Transformers\AbstractTransformers;

use NextDeveloper\Commons\Database\Models\Addresses;
use NextDeveloper\Commons\Database\Models\Comments;
use NextDeveloper\Commons\Database\Models\Meta;
use NextDeveloper\Commons\Database\Models\PhoneNumbers;
use NextDeveloper\Commons\Database\Models\SocialMedia;
use NextDeveloper\Commons\Database\Models\Votes;
use NextDeveloper\Commons\Database\Models\Media;
use NextDeveloper\Commons\Http\Transformers\MediaTransformer;
use NextDeveloper\Commons\Database\Models\AvailableActions;
use NextDeveloper\Commons\Http\Transformers\AvailableActionsTransformer;
use NextDeveloper\Commons\Database\Models\States;
use NextDeveloper\Commons\Http\Transformers\StatesTransformer;
use NextDeveloper\Commons\Http\Transformers\CommentsTransformer;
use NextDeveloper\Commons\Http\Transformers\SocialMediaTransformer;
use NextDeveloper\Commons\Http\Transformers\MetaTransformer;
use NextDeveloper\Commons\Http\Transformers\VotesTransformer;
use NextDeveloper\Commons\Http\Transformers\AddressesTransformer;
use NextDeveloper\Commons\Http\Transformers\PhoneNumbersTransformer;
use NextDeveloper\Partnership\Database\Models\AccountsPerspective;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;
use NextDeveloper\IAM\Database\Scopes\AuthorizationScope;

/**
 * Class AccountsPerspectiveTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Partnership\Http\Transformers
 */
class AbstractAccountsPerspectiveTransformer extends AbstractTransformer
{

    /**
     * @var array
     */
    protected array $availableIncludes = [
        'states',
        'actions',
        'media',
        'comments',
        'votes',
        'socialMedia',
        'phoneNumbers',
        'addresses',
        'meta'
    ];

    /**
     * @param AccountsPerspective $model
     *
     * @return array
     */
    public function transform(AccountsPerspective $model)
    {
        $iamAccountId = \NextDeveloper\IAM\Database\Models\Accounts::where('id', $model->iam_account_id)->first();
        $iamAccountTypeId = \NextDeveloper\IAM\Database\Models\AccountTypes::where('id', $model->iam_account_type_id)->first();
        $commonDomainId = \NextDeveloper\Commons\Database\Models\Domains::where('id', $model->common_domain_id)->first();
        $commonCountryId = \NextDeveloper\Commons\Database\Models\Countries::where('id', $model->common_country_id)->first();
        $iamUserId = \NextDeveloper\IAM\Database\Models\Users::where('id', $model->iam_user_id)->first();
        $distributorId = \NextDeveloper\Partnership\Database\Models\Accounts::where('id', $model->distributor_id)->first();

        return $this->buildPayload(
            [
                'id' => $model->uuid,
                'name' => $model->name,
                'description' => $model->description,
                'iam_account_id' => $iamAccountId ? $iamAccountId->uuid : null,
                'iam_account_type_id' => $iamAccountTypeId ? $iamAccountTypeId->uuid : null,
                'account_type' => $model->account_type,
                'common_domain_id' => $commonDomainId ? $commonDomainId->uuid : null,
                'domain_name' => $model->domain_name,
                'common_country_id' => $commonCountryId ? $commonCountryId->uuid : null,
                'country_name' => $model->country_name,
                'iam_user_id' => $iamUserId ? $iamUserId->uuid : null,
                'account_owner' => $model->account_owner,
                'distributor_id' => $distributorId ? $distributorId->uuid : null,
                'distributor' => $model->distributor,
                'partner_code' => $model->partner_code,
                'is_brand_ambassador' => $model->is_brand_ambassador,
                'payable_income' => $model->payable_income,
                'customer_count' => $model->customer_count,
                'iban' => $model->iban,
                'level' => $model->level,
                'reward_points' => $model->reward_points,
                'boosts' => $model->boosts,
                'mystery_box' => $model->mystery_box,
                'badges' => $model->badges,
                'technical_capabilities' => $model->technical_capabilities,
                'industry' => $model->industry,
                'sector_focus' => $model->sector_focus,
                'special_interest' => $model->special_interest,
                'compliance_certifications' => $model->compliance_certifications,
                'is_reseller' => $model->is_reseller,
                'is_integrator' => $model->is_integrator,
                'is_distributor' => $model->is_distributor,
                'is_vendor' => $model->is_vendor,
                'is_affiliate' => $model->is_affiliate,
                'target_group' => $model->target_group,
                'meeting_link' => $model->meeting_link,
                'created_at' => $model->created_at,
                'updated_at' => $model->updated_at,
                'deleted_at' => $model->deleted_at,
            ]
        );
    }

    public function includeStates(AccountsPerspective $model)
    {
        $states = States::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($states, new StatesTransformer());
    }

    public function includeActions(AccountsPerspective $model)
    {
        $input = get_class($model);
        $input = str_replace('\\Database\\Models', '', $input);

        $actions = AvailableActions::withoutGlobalScope(AuthorizationScope::class)
            ->where('input', $input)
            ->get();

        return $this->collection($actions, new AvailableActionsTransformer());
    }

    public function includeMedia(AccountsPerspective $model)
    {
        $media = Media::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($media, new MediaTransformer());
    }

    public function includeSocialMedia(AccountsPerspective $model)
    {
        $socialMedia = SocialMedia::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($socialMedia, new SocialMediaTransformer());
    }

    public function includeComments(AccountsPerspective $model)
    {
        $comments = Comments::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($comments, new CommentsTransformer());
    }

    public function includeVotes(AccountsPerspective $model)
    {
        $votes = Votes::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($votes, new VotesTransformer());
    }

    public function includeMeta(AccountsPerspective $model)
    {
        $meta = Meta::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($meta, new MetaTransformer());
    }

    public function includePhoneNumbers(AccountsPerspective $model)
    {
        $phoneNumbers = PhoneNumbers::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($phoneNumbers, new PhoneNumbersTransformer());
    }

    public function includeAddresses(AccountsPerspective $model)
    {
        $addresses = Addresses::where('object_type', get_class($model))
            ->where('object_id', $model->id)
            ->get();

        return $this->collection($addresses, new AddressesTransformer());
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE


}
