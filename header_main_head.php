<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html <?php echo HTML_PARAMS; ?> >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
        <title><?php echo TITLE; ?></title>
        <base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
        
        <link rel="stylesheet" type="text/css" href="stylesheet.css" media="screen" charset="utf-8">
        <link rel="stylesheet" type="text/css" href="stylesheetperso.css" media="screen" charset="utf-8">
        
        <?php include 'script.php'; ?>
