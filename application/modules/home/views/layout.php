<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <title><?php echo ($options->title == NULL ? $subtitle : $subtitle.' | '.$options->title) ?></title>
    <link href="<?php echo $options->favicon ?>" rel="shortcut icon" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width"/>
    <meta name="Keywords" content="<?php echo $options->keyword ?>"/>
    <meta name="Description" content="<?php echo $options->description ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo site_url(); ?>"/>
    <meta property="og:site_name" content="<?php echo $options->title ?>"/>
    <meta property="og:image" content="<?php echo $options->logo ?>"/>
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">
    <meta property="og:title" content="<?php echo $subtitle ?>"/>
    <meta property="og:description" content="<?php echo $options->description ?>"/>

    
</head>
<?php $this->load->helper('home/home'); ?>
<body>
    <div id="wrapper">
        <?php $this->load->view($subview, TRUE); ?>
    </div>

    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_EN/sdk.js#xfbml=1&version=v2.11&appId=1203554176363535';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <script src="/public/frontend/js/scripts.js"></script>
    <script src="/public/frontend/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function () {
            var $allVideos = $("iframe[src*='//player.vimeo.com'], iframe[src*='//www.youtube.com'], object, embed"),
                $fluidEl = $(".box_video");

            $allVideos.each(function () {

                $(this)
                // jQuery .data does not work on object/embed elements
                    .attr('data-aspectRatio', this.height / this.width)
                    .removeAttr('height')
                    .removeAttr('width');

            });

            $(window).resize(function () {

                var newWidth = $fluidEl.width();
                $allVideos.each(function () {

                    var $el = $(this);
                    $el
                        .width(newWidth)
                        .height(newWidth * $el.attr('data-aspectRatio'));

                });

            }).resize();

        });
        function openNav() {
			document.getElementById("mySidenav").style.width = "70%";
		}

		function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
		}
    </script>
</body>
</html>