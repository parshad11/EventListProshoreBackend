<?php
namespace App\Repositories;

use App\Models\EventDetails;
use App\Repositories\EventRepository\ProshoreEventRepositoryInterface;

class ProshoreEventRepository implements ProshoreEventRepositoryInterface{

    public function addEventList($request){
        $EventAdd = EventDetails::create($request);
        return $EventAdd->makeHidden(['deleted_at', 'created_at', 'updated_at']);
    }

    public function getEventList(){
        return EventDetails::query()->select('id','title','description','start_date','end_date')->orderBy('start_date', 'ASC')->paginate();
    }
    public function editEventList( $request){
        return EventDetails::where('id',$request['id'])->update($request);
    }
    public function deleteEventList( $request){
        $deletingEvent = EventDetails::find($request['id']);
        return $deletingEvent->delete();;
    }

}