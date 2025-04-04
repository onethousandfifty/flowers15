<?php
require_once "includes/posts.php";

// Fetch latest posts
$posts = array_slice(getPosts(), 0, 5); // Get only the 5 most recent posts
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta property="og:image" content="preview-image.png"/>
  <title>Flowers 15</title>
  <link rel="icon" href="tsv15_icon.ico" type="images/x-icon">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="scroll.css">
  <link rel="stylesheet" href="media-query.css" type="text.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"
  >
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="jquery.drawsvg.js"></script>

  <style>
      .footer-link {
          font-family: Cabin, sans-serif;
          font-size: 6px;
          letter-spacing: 3px;
          text-indent: 3px;
          color: #4e5559;
      }
  </style>
</head>
<body>
<audio autoplay loop id="playAudio">
  <source src="rex.mp3" type="audio/mpeg">
  <!--Your browser does not support the audio element.-->
</audio>

<center style="margin-top:40px;">
  <div class="mouse"></div>
  <p class="mouse-scroll">Scroll<br/>Tap</p></center>

<div class="wrapper">
  <div class="logo">
    <img src="Logo.jpg" alt="Logo">
  </div>

  <div class="svg-container">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
         y="0px"
         width="982px" height="882px" viewBox="-173.5 -51.5 982 882" enable-background="new -173.5 -51.5 982 882"
         xml:space="preserve"
         preserveAspectRatio="xMidYMid meet"
    >
            <g id="Ebene_2">
            <g id="Ebene_1-2">
                <path fill="none" stroke="#000000" stroke-width="10" stroke-miterlimit="10" d="M348.125,414.227l55.491-46.49l65.177-113.034
                   c0.41-0.849,1.43-1.205,2.279-0.797c7.862,3.874,45.578,20.852,78.964,3.418c1.39-0.737,3.114-0.208,3.852,1.183
                   c0.051,0.097,0.097,0.196,0.137,0.299l21.422,67.797c3.273,21.982,2.229,44.392-3.077,65.974c0,0,21.08,22.789-3.19,28.602
                   c0,0-18.687,11.395-18.687,17.434s3.988,38.627,3.988,38.627l-34.184-20.055l32.815,118.047c0.945,3.039-0.155,6.342-2.734,8.205
                   c-12.72,7.646-27.32,11.592-42.16,11.395l2.507,37.373l-20.396,9.344l2.507,22.789c0,0-11.395,1.367-24.954,21.08l131.379,43.299
                   l-34.525-237.006l54.238-275.861L300.382,16.671l-164.309,8.773L27.711,198.414c-31.107,136.734,8.774,321.211,17.434,330.441
                   c8.66,9.229,286.345,233.473,286.345,233.473L292.862,393.83c0-2.279,6.723-3.418,7.52-1.254
                   c11.395,34.867,29.512,45.578,41.021,34.867s6.153-20.055-1.253-34.184c-4.942-8.654-11.803-16.061-20.055-21.648
                   c35.323-1.938,54.922-3.191,49.908-33.159c-3.874-22.789-38.628-5.697-53.896,3.19c-1.365,0.782-3.105,0.308-3.887-1.057
                   c-0.412-0.718-0.49-1.58-0.215-2.361c8.888-26.207,10.482-56.973-16.637-55.719c-19.712,0.798-19.37,25.979-16.863,43.071
                   c0.463,3.43-1.941,6.586-5.371,7.05c-1.375,0.186-2.771-0.089-3.973-0.783c-21.194-11.395-51.162-13.217-52.187,9.116
                   c-0.912,20.396,31.905,26.322,48.769,28.031c1.949,0.081,3.463,1.727,3.381,3.676c-0.045,1.075-0.576,2.07-1.444,2.705
                   c-13.445,10.711-38.286,34.184-23.358,52.756c19.94,24.955,48.541-34.867,48.541-34.867"
                />
            </g>
            </g>
        </svg>
  </div>

  <div class="posts-section">
    <?php foreach ($posts as $post): ?>
      <div class="post">
        <div class="post-content"><?php echo htmlspecialchars($post["content"]); ?></div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<div class="media">
  <ul>
    <li><a href="https://www.youtube.com/channel/UCW1N0PTNB7rhQ436K91vDaw/videos?app=desktop" class="svg"
           target="_blank"
    >
      <p class="footer-link">Youtube</p>
      <object data="youtube.svg" type="image/svg+xml">
      </object>
    </a></li>
    <li><a href="https://www.facebook.com/iamflowers15/" class="svg" target="_blank">
      <p class="footer-link">Facebook</p>
      <object data="facebook.svg" type="image/svg+xml">
      </object>
    </a></li>
    <li><a href="https://www.instagram.com/iamflowers15/" class="svg" target="_blank">
      <p class="footer-link">Instagram</p>
      <object data="instagram.svg" type="image/svg+xml">
      </object>
    </a></li>
    <li><a href="https://www.linkedin.com/company/flowers15" class="svg" target="_blank">
      <p class="footer-link">Linkedin</p>
      <object data="linkedin.svg" type="image/svg+xml">
      </object>
    </a></li>
    <li><a href="https://flowers15.bandcamp.com/" class="svg" target="_blank">
      <p class="footer-link">Bandcamp</p>
      <object data="bandcamp-logo.svg" type="image/svg+xml">
      </object>
    </a></li>
    <li><a href="https://open.spotify.com/artist/5WXg5oRiMnT5BLFhs7mfI6" class="svg" target="_blank">
      <p class="footer-link">Spotify</p>
      <object data="spotify.svg" type="image/svg+xml">
      </object>
    </a></li>
  </ul>
</div>

<script>
  var src = [
    'fashion.mp3',
    'fashion.mp3'
  ]

  var rand = Math.floor(Math.random() * src.length)
  $('#playAudio source').attr('src', src[rand])
  $('#playAudio')[0].load()

  var playing = false
  document.addEventListener('click', musicPlay)

  function musicPlay (e) {
    if (playing) {
      document.getElementById('playAudio').pause()
      playing = false
    } else {
      document.getElementById('playAudio').play()
      playing = true
    }
  }

  $('a').click(function (e) {
    e.stopPropagation()
  })

  $(document).ready(function() {
    var $win = $(window)
    var $svg = $('#Layer_1').drawsvg({
      duration: 50,
      stagger: 50,
      easing: 'linear'
    })

    var $logo = $('.logo')
    var $svgContainer = $('.svg-container')
    var $postsSection = $('.posts-section')

    // Initially hide SVG and posts
    $svgContainer.hide()
    $postsSection.hide()

    // Calculate max scroll
    var max = $(document).height() - $(window).height()

    $win.on('scroll', function() {
      var p = $win.scrollTop() / max

      if (p > 0.1) { // After 10% scroll
        $logo.fadeOut(300)
        $svgContainer.fadeIn(300)
        
        if (p >= 0.99) { // Show posts when SVG is almost complete
          $postsSection.fadeIn(300)
        } else {
          $postsSection.fadeOut(300)
        }
      } else {
        $logo.fadeIn(300)
        $svgContainer.fadeOut(300)
        $postsSection.fadeOut(300)
      }

      $svg.drawsvg('progress', p)
    })
  })
</script>

</body>
</html>
