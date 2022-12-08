<?php

namespace App\Traits;

use App\Models\ZoomSetting;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Log;

/**
 * trait ZoomMeetingTrait
 */
trait ZoomMeetingTrait
{
    public $client;
    public $jwt;
    public $headers;

    public function __construct()
    {
        $this->client = new Client();
        $this->jwt = $this->generateZoomToken();
        $this->headers = [
            'Authorization' => 'Bearer ' . $this->jwt,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    public function generateZoomToken()
    {
        $zoom = ZoomSetting::whereUserId(Auth::id())->first();

        $key = @$zoom->api_key ?? '';
        $secret = @$zoom->api_secret ?? '';
        $payload = [
            'iss' => $key,
            'exp' => strtotime('+1 minute'),
        ];

        return \Firebase\JWT\JWT::encode($payload, $secret, 'HS256');
    }

    private function retrieveZoomUrl()
    {
        return env('ZOOM_API_URL', 'https://api.zoom.us/v2/');
    }

    public function toZoomTimeFormat(string $dateTime)
    {
        try {
            $date = new \DateTime($dateTime);

            return $date->format('Y-m-d\TH:i:s');
        } catch (\Exception $e) {
            Log::error('ZoomJWT->toZoomTimeFormat : ' . $e->getMessage());

            return '';
        }
    }

    public function create($data)
    {
        $zoom = ZoomSetting::find(Auth::id());

        $c = new Client();
        $j =  $this->generateZoomToken();
        $path = 'users/me/meetings';
        $url = $this->retrieveZoomUrl();

        $body = [
            'headers' => [
                'Authorization' => 'Bearer ' . $j,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode([
                'topic' => $data['topic'],
                'type' => self::MEETING_TYPE_SCHEDULE,
                'start_time' => $this->toZoomTimeFormat($data['start_date']),
                'duration' => $data['duration'],
                'agenda' => (!empty($data['agenda'])) ? $data['agenda'] : null,
                'timezone' => @$zoom->timezone ?? 'Asia/Dhaka',
                'settings' => [
                    'host_video' =>  @$zoom->host_video ?? 0,
                    'participant_video' =>  @$zoom->participant_video ?? 0,
                    'waiting_room' =>  @$zoom->waiting_room ?? 0,
                ],
            ]),
        ];
        $response = $c->post($url.$path, $body);


        return [
            'success' => $response->getStatusCode() === 201,
            'data' => json_decode($response->getBody(), true),
        ];
    }

    public function update($id, $data)
    {
        $zoom = ZoomSetting::find(Auth::id());

        $path = 'meetings/' . $id;
        $url = $this->retrieveZoomUrl();

        $body = [
            'headers' => $this->headers,
            'body' => json_encode([
                'topic' => $data['topic'],
                'type' => self::MEETING_TYPE_SCHEDULE,
                'start_time' => $this->toZoomTimeFormat($data['start_time']),
                'duration' => $data['duration'],
                'agenda' => (!empty($data['agenda'])) ? $data['agenda'] : null,
                'timezone' => @$zoom->timezone ?? 'Asia/Dhaka',
                'settings' => [
                    'host_video' => ($data['host_video'] == "1") ? true : false,
                    'participant_video' => ($data['participant_video'] == "1") ? true : false,
                    'waiting_room' => true,
                ],
            ]),
        ];
        $response = $this->client->patch($url . $path, $body);

        return [
            'success' => $response->getStatusCode() === 204,
            'data' => json_decode($response->getBody(), true),
        ];
    }

    public function get($id)
    {
        $path = 'meetings/' . $id;
        $url = $this->retrieveZoomUrl();
        $this->jwt = $this->generateZoomToken();
        $body = [
            'headers' => $this->headers,
            'body' => json_encode([]),
        ];

        $response = $this->client->get($url . $path, $body);

        return [
            'success' => $response->getStatusCode() === 204,
            'data' => json_decode($response->getBody(), true),
        ];
    }

    /**
     * @param string $id
     *
     * @return bool[]
     */
    public function delete($id)
    {
        $path = 'meetings/' . $id;
        $url = $this->retrieveZoomUrl();
        $body = [
            'headers' => $this->headers,
            'body' => json_encode([]),
        ];

        $response = $this->client->delete($url . $path, $body);

        return [
            'success' => $response->getStatusCode() === 204,
        ];
    }
}
