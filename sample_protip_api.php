<?php
	include('plugins/simple_html_dom.php');
	$fh = 'http://fuckinghomepage.com/';

	$source = file_get_html($fh);
	$source_page = $source->find('span.Numeration',0)->plaintext;
	$max_page = explode(" ", $source_page);


if (isset($_POST['random'])) {
    $rand_page = rand(1, $max_page[4] - 81);

    $html = file_get_html($fh . 'page/' . $rand_page . '');

    $protip[] = array(
        'date' => $html->find('a.Title', 0)->plaintext,
        'protip' => $html->find('div.PostBody', 0)
            ->children(2)
            ->plaintext
    );

    $result = $protip[0]['protip'];
    $tweet = '<a href="https://twitter.com/intent/tweet?text=' . $result . ' via #FINGPROTIPS" class="twitter-hashtag-button" data-related="_aimanb,FUCKINGHOMEPAGE" data-url="http://fing-protips.aimanbaharum.com/">Tweet</a>';

    echo '<blockquote class="pull-right"><p class="protip">' . $result . '</p>
        <small>' . $protip[0]['date'] . '</small>' . $tweet . '</blockquote>';

    $html->clear();
    unset($html);
}
?>
