<?php
define("SDK_BASE", dirname(__FILE__));
define("ADAPAY_CORE", SDK_BASE."/../AdapayCore");
define("SDK_VERSION", "v1.0.3");
define("GATE_WAY_URL", "https://%s.adapay.tech");
define("DEBUG", true);
define("LOG", dirname(SDK_BASE)."/log/prod");
define("ENV", "prod");

include_once ADAPAY_CORE."/AdaPay.php";
include_once ADAPAY_CORE."/AdaLoader.php";

include_once SDK_BASE."/MerchantConf.php";
include_once SDK_BASE."/MerchantUser.php";
include_once SDK_BASE."/MerchantProfile.php";