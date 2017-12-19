<?php

	function preparerBoisson( $boisson, $sucre) {
        if ($boisson == "expresso") {
            preparerExpresso($sucre);
        } else if ($boisson == "cafe long") {
            preparerCafeLong($sucre);
        } else if ($boisson == "the") {
            preparerThe($sucre);
        }
    }

?>