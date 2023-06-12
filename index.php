<?php
  session_start();
  
  require_once('db_init.php');
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/piano.css">
    <link rel="stylesheet" href="styles/header.css">
</head>
<body>
<header>
    <nav id="navigation-bar">
        <div class="navigation-group">
            <a id="home">Начало</a>
            <?php if(isset($_SESSION["user"])): ?>
              <div class="dropdown">
                <a class="dropdown-toggle">Песни</a>
                <div id="dropdown-content" class="dropdown-content">
                </div>
            </div>
  <?php endif; ?>
        </div>
        <div id="sources" class="navigation-group">
		<?php if(!isset($_SESSION["user"])): ?>
            <a href="registration.html">Регистрация</a>
            <a href="login.html">Вход</a>
  <?php endif; ?>
		<?php if(isset($_SESSION["user"])): ?>
             <a href="logout.php">Изход</a>
  <?php endif; ?>
        </div>
    </nav>
</header>
<div id="piano-container">
    <input id="song-name">
    <div id="text"></div>
    <textarea autofocus id="input" oninput="checkTyping()"></textarea>
	<?php if(isset($_SESSION["user"])): ?>
             <div>
        <button id="save-button">Запазване като нова песен</button>
        <button id="update-button">Обновяване на текущата песен</button>
    </div>
  <?php endif; ?>
    <div id="piano">
        <div id="1" class="key white C"><label>1</label></div>
        <div id="!" class="key black C#"><label>!</label></div>
        <div id="2" class="key white D"><label>2</label></div>
        <div id="@" class="key black D#"><label>@</label></div>
        <div id="3" class="key white E"><label>3</label></div>
        <div id="4" class="key white F"><label>4</label></div>
        <div id="$" class="key black F#"><label>$</label></div>
        <div id="5" class="key white G"><label>5</label></div>
        <div id="%" class="key black G#"><label>%</label></div>
        <div id="6" class="key white A"><label>6</label></div>
        <div id="^" class="key black A#"><label>^</label></div>
        <div id="7" class="key white B"><label>7</label></div>
        <div id="8" class="key white C'"><label>8</label></div>
        <div id="*" class="key black C#'"><label>*</label></div>
        <div id="9" class="key white D'"><label>9</label></div>
        <div id="(" class="key black D#'"><label>(</label></div>
        <div id="0" class="key white E'"><label>0</label></div>
        <div id="q" class="key white F'"><label>q</label></div>
        <div id="q1" class="key black F#'"><label>Q</label></div>
        <div id="w" class="key white G'"><label>w</label></div>
        <div id="w1" class="key black G#'"><label>W</label></div>
        <div id="e1" class="key white A'"><label>e</label></div>
        <div id="e2" class="key black A#'"><label>E</label></div>
        <div id="r" class="key white B'"><label>r</label></div>
        <div id="t" class="key white C''"><label>t</label></div>
        <div id="t1" class="key black C#''"><label>T</label></div>
        <div id="y" class="key white D''"><label>y</label></div>
        <div id="y1" class="key black D#''"><label>Y</label></div>
        <div id="u" class="key white E''"><label>u</label></div>
        <div id="i" class="key white F''"><label>i</label></div>
        <div id="i1" class="key black F#''"><label>I</label></div>
        <div id="o" class="key white G''"><label>o</label></div>
        <div id="o1" class="key black G#''"><label>O</label></div>
        <div id="p" class="key white A''"><label>p</label></div>
        <div id="p1" class="key black A#''"><label>P</label></div>
        <div id="a1" class="key white B''"><label>a</label></div>
        <div id="s" class="key white C'''"><label>s</label></div>
        <div id="s1" class="key black C#'''"><label>S</label></div>
        <div id="d1" class="key white D'''"><label>d</label></div>
        <div id="d2" class="key black D#'''"><label>D</label></div>
        <div id="f1" class="key white E'''"><label>f</label></div>
        <div id="g1" class="key white F'''"><label>g</label></div>
        <div id="g2" class="key black F#'''"><label>G</label></div>
        <div id="h" class="key white G'''"><label>h</label></div>
        <div id="h1" class="key black G#'''"><label>H</label></div>
        <div id="j" class="key white A'''"><label>j</label></div>
        <div id="j1" class="key black A#'''"><label>J</label></div>
        <div id="k" class="key white B'''"><label>k</label></div>
        <div id="l" class="key white C"><label>l</label></div>
        <div id="l1" class="key black C#"><label>L</label></div>
        <div id="z" class="key white D"><label>z</label></div>
        <div id="z1" class="key black D#"><label>Z</label></div>
        <div id="x" class="key white E"><label>x</label></div>
        <div id="c1" class="key white F"><label>c</label></div>
        <div id="c2" class="key black F#"><label>C</label></div>
        <div id="v" class="key white G"><label>v</label></div>
        <div id="v1" class="key black G#"><label>V</label></div>
        <div id="b1" class="key white A"><label>b</label></div>
        <div id="b2" class="key black A#"><label>B</label></div>
        <div id="n" class="key white B"><label>n</label></div>
        <div id="m" class="key white C'''"><label>m</label></div>

        <audio id="C" src="audio/C.mp3"></audio>
        <audio id="C#" src="audio/C%23.mp3"></audio>
        <audio id="D" src="audio/D.mp3"></audio>
        <audio id="D#" src="audio/D%23.mp3"></audio>
        <audio id="E" src="audio/E.mp3"></audio>
        <audio id="F" src="audio/F.mp3"></audio>
        <audio id="F#" src="audio/F%23.mp3"></audio>
        <audio id="G" src="audio/G.mp3"></audio>
        <audio id="G#" src="audio/G%23.mp3"></audio>
        <audio id="A" src="audio/A.mp3"></audio>
        <audio id="A#" src="audio/A%23.mp3"></audio>
        <audio id="B" src="audio/B.mp3"></audio>
        <audio id="C'" src="audio/C'.mp3"></audio>
        <audio id="C#'" src="audio/C%23'.mp3"></audio>
        <audio id="D'" src="audio/D'.mp3"></audio>
        <audio id="D#'" src="audio/D%23'.mp3"></audio>
        <audio id="E'" src="audio/E'.mp3"></audio>
        <audio id="F'" src="audio/F'.mp3"></audio>
        <audio id="F#'" src="audio/F%23'.mp3"></audio>
        <audio id="G'" src="audio/G'.mp3"></audio>
        <audio id="G#'" src="audio/G%23'.mp3"></audio>
        <audio id="A'" src="audio/A'.mp3"></audio>
        <audio id="A#'" src="audio/A%23'.mp3"></audio>
        <audio id="B'" src="audio/B'.mp3"></audio>
        <audio id="C''" src="audio/C''.mp3"></audio>
        <audio id="C#''" src="audio/C%23''.mp3"></audio>
        <audio id="D''" src="audio/D''.mp3"></audio>
        <audio id="D#''" src="audio/D%23''.mp3"></audio>
        <audio id="E''" src="audio/E''.mp3"></audio>
        <audio id="F''" src="audio/F''.mp3"></audio>
        <audio id="F#''" src="audio/F%23''.mp3"></audio>
        <audio id="G''" src="audio/G''.mp3"></audio>
        <audio id="G#''" src="audio/G%23''.mp3"></audio>
        <audio id="A''" src="audio/A''.mp3"></audio>
        <audio id="A#''" src="audio/A%23''.mp3"></audio>
        <audio id="B''" src="audio/B''.mp3"></audio>
        <audio id="C'''" src="audio/C'''.mp3"></audio>
        <audio id="C#'''" src="audio/C%23'''.mp3"></audio>
        <audio id="D'''" src="audio/D'''.mp3"></audio>
        <audio id="D#'''" src="audio/D%23'''.mp3"></audio>
        <audio id="E'''" src="audio/E'''.mp3"></audio>
        <audio id="F'''" src="audio/F'''.mp3"></audio>
        <audio id="F#'''" src="audio/F%23'''.mp3"></audio>
        <audio id="G'''" src="audio/G'''.mp3"></audio>
        <audio id="G#'''" src="audio/G%23'''.mp3"></audio>
        <audio id="A'''" src="audio/A'''.mp3"></audio>
        <audio id="A#'''" src="audio/A%23'''.mp3"></audio>
        <audio id="B'''" src="audio/B'''.mp3"></audio>
    </div>
</div>
<script>
    var songs = <?php echo json_encode($songs) ?>;

    document.getElementById("song-name").value = songs[0].name;
    document.getElementById("text").innerText = songs[0].chords;
	
	const dropdownContent = document.getElementById("dropdown-content");
	
	if (dropdownContent) {
		songs.forEach(song => {
  const a = document.createElement("a");
  a.href = "#";
  a.textContent = song.name;
  dropdownContent.appendChild(a);
});
	
	
	const links = document.querySelectorAll("#dropdown-content a");

	if (links) {
		links.forEach(link => {
	link.addEventListener("click", event => {
		document.getElementById("song-name").value = event.target.textContent;
		document.getElementById("text").innerText = songs.filter((song) => song.name === event.target.textContent)[0].chords;
		document.getElementById('input').value = '';
	});
	});
	}
}
	


	
	
</script>
<script src="main.js"></script>
<script src="piano.js"></script>
</body>
</html>
