<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use GuzzleHttp\Client;

class ProductController extends Controller
{
    public function actionObterDadosProduto($meli_id)
    {
        $client = new Client();

        // Substitua 'SEU_APP_ID' e 'SEU_APP_SECRET' pelas credenciais de sua aplicação no Mercado Livre.
        $app_id = 'SEU_APP_ID';
        $app_secret = 'SEU_APP_SECRET';

        // Autenticação na API do Mercado Livre para obter informações do produto.
        $response = $client->post("https://api.mercadolibre.com/oauth/token", [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => $app_id,
                'client_secret' => $app_secret,
            ],
        ]);

        $access_token = json_decode($response->getBody()->getContents())->access_token;

        // Consulta à API do Mercado Livre para obter informações do produto com base no meli_id.
        $response = $client->get("https://api.mercadolibre.com/items/$meli_id", [
            'headers' => [
                'Authorization' => 'Bearer ' . $access_token,
            ],
        ]);

        if ($response->getStatusCode() === 200) {
            $productData = json_decode($response->getBody()->getContents());

            $productInfo = [
                'id' => $productData->id,
                'title' => $productData->title,
                'category' => $productData->category_id,
                'price' => $productData->price,
                'available_quantity' => $productData->available_quantity,
                'thumbnail' => $productData->thumbnail,
                'permalink' => $productData->permalink,
            ];

            // Retorna as informações relevantes do produto em formato JSON.
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $productInfo;
        } else {
            // Trate o erro apropriado, dependendo da resposta da API do Mercado Livre.
            Yii::$app->response->statusCode = $response->getStatusCode();
            return [
                'error' => 'Erro na obtenção dos dados do produto.',
            ];
        }
    }
}
