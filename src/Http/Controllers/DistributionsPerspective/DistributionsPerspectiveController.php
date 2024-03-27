<?php

namespace NextDeveloper\Partnership\Http\Controllers\DistributionsPerspective;

use Illuminate\Http\Request;
use NextDeveloper\Partnership\Http\Controllers\AbstractController;
use NextDeveloper\Commons\Http\Response\ResponsableFactory;
use NextDeveloper\Partnership\Http\Requests\DistributionsPerspective\DistributionsPerspectiveUpdateRequest;
use NextDeveloper\Partnership\Database\Filters\DistributionsPerspectiveQueryFilter;
use NextDeveloper\Partnership\Database\Models\DistributionsPerspective;
use NextDeveloper\Partnership\Services\DistributionsPerspectiveService;
use NextDeveloper\Partnership\Http\Requests\DistributionsPerspective\DistributionsPerspectiveCreateRequest;
use NextDeveloper\Commons\Http\Traits\Tags;use NextDeveloper\Commons\Http\Traits\Addresses;
class DistributionsPerspectiveController extends AbstractController
{
    private $model = DistributionsPerspective::class;

    use Tags;
    use Addresses;
    /**
     * This method returns the list of distributionsperspectives.
     *
     * optional http params:
     * - paginate: If you set paginate parameter, the result will be returned paginated.
     *
     * @param  DistributionsPerspectiveQueryFilter $filter  An object that builds search query
     * @param  Request                             $request Laravel request object, this holds all data about request. Automatically populated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(DistributionsPerspectiveQueryFilter $filter, Request $request)
    {
        $data = DistributionsPerspectiveService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
     * This method receives ID for the related model and returns the item to the client.
     *
     * @param  $distributionsPerspectiveId
     * @return mixed|null
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public function show($ref)
    {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = DistributionsPerspectiveService::getByRef($ref);

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method returns the list of sub objects the related object. Sub object means an object which is preowned by
     * this object.
     *
     * It can be tags, addresses, states etc.
     *
     * @param  $ref
     * @param  $subObject
     * @return void
     */
    public function relatedObjects($ref, $subObject)
    {
        $objects = DistributionsPerspectiveService::relatedObjects($ref, $subObject);

        return ResponsableFactory::makeResponse($this, $objects);
    }

    /**
     * This method created DistributionsPerspective object on database.
     *
     * @param  DistributionsPerspectiveCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function store(DistributionsPerspectiveCreateRequest $request)
    {
        $model = DistributionsPerspectiveService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates DistributionsPerspective object on database.
     *
     * @param  $distributionsPerspectiveId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function update($distributionsPerspectiveId, DistributionsPerspectiveUpdateRequest $request)
    {
        $model = DistributionsPerspectiveService::update($distributionsPerspectiveId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates DistributionsPerspective object on database.
     *
     * @param  $distributionsPerspectiveId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function destroy($distributionsPerspectiveId)
    {
        $model = DistributionsPerspectiveService::delete($distributionsPerspectiveId);

        return $this->noContent();
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
