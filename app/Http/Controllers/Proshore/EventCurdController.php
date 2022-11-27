<?php

namespace App\Http\Controllers\Proshore;

use App\Http\Controllers\Controller;
use App\Repositories\EventRepository\ProshoreEventRepositoryInterface;
use App\Helpers\ProshoreEventHelpers\ProshoreEventHelper;
use App\Http\Requests\AddEventRequest;
use App\Http\Requests\EventListDeleteRequest;
use App\Http\Requests\EventListEditRequest;
use Illuminate\Http\Request;

class EventCurdController extends Controller
{

    private ProshoreEventRepositoryInterface $ProshoreEventRepository;

    public function __construct(ProshoreEventRepositoryInterface $ProshoreEventRepository)
    {
        $this->ProshoreEventRepository = $ProshoreEventRepository;
    }


    public function addEventList(AddEventRequest $request){
        $dataSaving = $this->ProshoreEventRepository->addEventList($request->validated());
        if($dataSaving){
            return ProshoreEventHelper::successResponse(200 , $dataSaving , 'Event has been added.');
        }
        return ProshoreEventHelper::errorResponse(422  , 'Event has been failed to add.');
    }

    public function getEventList(){
        $dataFetching = $this->ProshoreEventRepository->getEventList();
        if($dataFetching){
            return ProshoreEventHelper::successResponse(200 , $dataFetching , 'Event has been fetched.');
        }
        return ProshoreEventHelper::errorResponse(422  , 'Some issue occured while getting event list.');
    }

    public function editEventList(EventListEditRequest $request){
        $dataEditing = $this->ProshoreEventRepository->editEventList($request->validated());
        if($dataEditing){
            return ProshoreEventHelper::successResponse(200 , $request->validated() , 'Event has been edited.');
        }
        return ProshoreEventHelper::errorResponse(422  , 'Some issue occured while editing event list.');
    }

    public function deleteEventList(EventListDeleteRequest $request){
        $dataEditing = $this->ProshoreEventRepository->deleteEventList($request->validated());
        if($dataEditing){
            return ProshoreEventHelper::successResponse(200 , $request->validated() , 'Event has been deleted.');
        }
        return ProshoreEventHelper::errorResponse(422  , 'Some issue occured while deleting event list.');
    }
    
}
