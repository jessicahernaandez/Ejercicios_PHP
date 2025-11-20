<?php
    $nuevo = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
    echo $nuevo; // &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;
?>