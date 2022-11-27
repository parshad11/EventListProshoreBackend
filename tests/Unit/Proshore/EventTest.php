<?php

namespace Tests\Unit\Proshore;

use Tests\TestCase;
use App\Models\EventDetails;

class EventTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGetEventList()
    {

        $response = $this->get('/api/pro/get-event-list');

        $response
            ->assertStatus(200)
            ->assertSeeText('Event has been fetched.')
            ->assertJsonStructure([
                'statusCode',
                'message',
                'data' => [
                    'current_page',
                    'data'=>[
                        '*' =>['id', 'title', 'description', 'start_date', 'end_date'],
                    ],
                    'first_page_url',
                    'from',
                    'last_page',
                    'last_page_url',
                    'links'=>[
                        '*' =>['url','label','active']
                    ],
                    'next_page_url',
                    'path',
                    'per_page',
                    'prev_page_url',
                    'to',
                    'total',  
                ],  
            ]);
    }

    public function testAddEventList()
    {

        $response = $this->post('/api/pro/add-event-list',[
            "title" => "Tourism Nepal Event",
            "description" => "It is a event about the tourism of nepal.",
            "start_date" => date("Y-m-d", strtotime("+1 day")),
            "end_date" => date("Y-m-d", strtotime("+5 day")),
        ]);

        $response
            ->assertStatus(200)
            ->assertSeeText('Event has been added.')
            ->assertJsonStructure([
                'statusCode', 'message', 'data' => [
                    'id', 'title', 'description', 'start_date', 'end_date'
                    ]
                    
            ]);
    }

    public function testEditEventList()
    {

        $response = $this->post('/api/pro/edit-event-list',[
            "id" => encrypt(EventDetails::select('id')->first()['id']),
            "title" => "Tourism Nepal Event",
            "description" => "It is a event about the tourism of nepal.",
            "start_date" => date("Y-m-d", strtotime("+1 day")),
            "end_date" => date("Y-m-d", strtotime("+5 day")),
        ]);

        $response
            ->assertStatus(200)
            ->assertSeeText('Event has been edited.')
            ->assertJsonStructure([
                'statusCode', 'message', 'data' => [
                    'id', 'title', 'description', 'start_date', 'end_date'
                    ]
                    
            ]);
    }

    public function testDeleteEventList()
    {

        $response = $this->delete('/api/pro/delete-event-list',[
            "id" => encrypt(EventDetails::select('id')->first()['id']),
        ]);

        $response
            ->assertStatus(200)
            ->assertSeeText('Event has been deleted.')
            ->assertJsonStructure([
                'statusCode', 'message', 'data' => [
                    'id'
                    ]
                    
            ]);
    }
}
