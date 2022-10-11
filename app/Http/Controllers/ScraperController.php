<?php

namespace App\Http\Controllers;

use Goutte\Client;
use GuzzleHttp\Client as Gclient;
use GuzzleHttp\Cookie\CookieJar;

use Illuminate\Http\Request;

class ScraperController extends Controller
{
    private $results = array();

    public function scraper()
    {
        //Instancia da classe Goutee;

        $client = new Client();
        $gclient = new Gclient();

        $crawler = $client->request('GET', 'http://applicant-test.us-east-1.elasticbeanstalk.com/');
        $token = $crawler->filter('#token')->first()->attr('value');

        $response = $gclient->request('POST', 'http://applicant-test.us-east-1.elasticbeanstalk.com', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36',
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,/;q=0.8,application/signed-exchange;v=b3;q=0.9',
                'Origin' => '*',
            ],
            'form_params' => [
            'token' => $this->getNewToken($token),
            ]
        ]);

        return $response->getBody()->getContents();
    }

    public function getNewToken($token)
    {
        $replacements = [
            'a' => 'z',
            'b' => 'y',
            'c' => 'x',
            'd' => 'w',
            'e' => 'v',
            'f' => 'u',
            'g' => 't',
            'h' => 's',
            'i' => 'r',
            'j' => 'q',
            'k' => 'p',
            'l' => 'o',
            'm' => 'n',
            'n' => 'm',
            'o' => 'l',
            'p' => 'k',
            'q' => 'j',
            'r' => 'i',
            's' => 'h',
            't' => 'g',
            'u' => 'f',
            'v' => 'e',
            'w' => 'd',
            'x' => 'c',
            'y' => 'b',
            'z' => 'a',
            '0' => '9',
            '1' => '8',
            '2' => '7',
            '3' => '6',
            '4' => '5',
            '5' => '4',
            '6' => '3',
            '7' => '2',
            '8' => '1',
            '9' => '0'
        ];


        $e = str_split($token);

        for ($t = 0; $t < count($e); $t++) {

            $e[$t] = isset($replacements[$e[$t]]) ? $replacements[$e[$t]] : $e[$t];
        }

        $e = implode("", $e);

        return  $e;
    }
}
