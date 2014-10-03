<?php

	$features_rows = $view->result;
	foreach ($features_rows as $id => $row):
		$node = node_load($row->nid);
		$features_nodes[] = $node;
	endforeach;
	
?>
<div class="prev"><</div>
<div class="next">></div>
<div class="children">
    <ul>
        <li class="child feature-what-is-lightworks"><div class="holder">
            <header class="header">
                <h1>What is LightWorks?</h1>
                <h2>LightWorks pulls light-inspired research at ASU under one strategic framework. It is a multidisciplinary effort to leverage ASU's unique strengths, particularly in renewable energy fields including artificial photosynthesis, biofuels, and next-generation photovoltaics.</h2>
            </header>
        </div></li>
        <li class="child feature-azcati"><div class="holder">
            <div class="overlay"></div>
            <a class="hit" href="/azcati.html">read more</a>
            <header class="header">
                <h1>Featured<br/>Solution: AzCATI</h1>
                <h2>The Arizona Center for Algae Technology and Innovation serves as a hub for research, testing, and commercialization of algae-based products. These include biofuels, pharmaceuticals, nutraceuticals, and other algae biomass co-products.</h2>
            </header>
        </div></li>
        <li class="child feature-energy-at-asu"><div class="holder">
            <header class="header">
                <h1>Energy@ASU</h1>
                <h2>ASU is committed to sustainability in all facets of its operations. The university generates more than 10 megawatts of electricity on its campuses and boasts 36 LEED silver or better certified buildings.</h2>
            </header>
        </div></li>
    </ul>
</div>