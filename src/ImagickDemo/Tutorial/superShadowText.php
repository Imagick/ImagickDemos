<?php

//convert standing_shape . png - flip + distort SRT '0,0 1,-1 0' \
//\(+clone -background Black - shadow 60x5 + 0 + 0 \
//-virtual - pixel Transparent \
//+distort Affine '0,0 0,0  100,0 100,0  0,100 100,50' \
//\) +swap - background white - layers merge \
//-fuzz 2 % -trim + repage   standing_shadow . jpg
//
