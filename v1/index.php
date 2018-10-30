<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Sunra\PhpSimple\HtmlDomParser;

require '../config/config.php';
require '../vendor/autoload.php';

$app = new \Slim\App(['settings' => $config]);

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->get('/random', function(Request $request, Response $response, array $args) {

    $fh = 'http://fuckinghomepage.com/';

    $parser = HtmlDomParser::file_get_html($fh);

    // get max page numbers

    $source_page = $parser->find('span.Numeration',0)->plaintext;

    // get random pages

	$max_page = explode(" ", $source_page);

    $rand_page = rand(1, $max_page[4] - 81);

    $html = HtmlDomParser::file_get_html($fh . 'page/' . $rand_page . '');

    $protip[] = array(
        'date' => $html->find('a.Title', 0)->plaintext,
        'protip' => $html->find('div.PostBody', 0)
            ->children(2)
            ->plaintext
    );

    $result = $protip[0]['protip'];

    echo ucfirst(strtolower($result));
    // $tweet = '<a href="https://twitter.com/intent/tweet?text=' . $result . ' via #FINGPROTIPS" class="twitter-hashtag-button" data-related="_aimanb,FUCKINGHOMEPAGE" data-url="http://fing-protips.aimanbaharum.com/">Tweet</a>';

    // return '<blockquote class="pull-right"><p class="protip">' . $result . '</p>
    //     <small>' . $protip[0]['date'] . '</small>' . $tweet . '</blockquote>';
    $html->clear();
    unset($html);
});



$app->run();

