let previous = document.querySelector("#pre");
let play_icon = document.querySelector("#play");
let next = document.querySelector("#next");
let title = document.querySelector("#title");
let recent_volume = document.querySelector("#volume");
let volume_show = document.querySelector("#volume_show");
let show_duration = document.querySelector("#duration_slider");
let auto_paly = document.querySelector("#auto");
let track_img = document.querySelector("#track_img");
let present = document.querySelector("#present");
let total = document.querySelector("#total");
let artist = document.querySelector("#artist");
let play_color = document.querySelector("#play_color");
let volume_icon = document.querySelector("#volume_icon");
let shuffle= document.querySelector("#shuffle");

let timer=0;
let autoplay = 0;
let index_no = 0;
let playing_song = false;
//creat a audio
let track = document.createElement("audio");

//all song list
let All_song = [
  {
    name: "joanna",
    path: "music/joanna.mp3",
    img: "imgg/img1.jpg",
    singer: "Drogba ft. Wizkid",
  },
  {
    name: "BOBO",
    path: "music/song2.mp3",
    img: "imgg/img2.jpg",
    singer: "Aya Nakamura",
  },
  {
    name: "On the low",
    path: "music/song3.mp3",
    img: "imgg/img3.jpg",
    singer: "Burna Boy",
  },
  {
    name: "Mod-Ting",
    path: "music/song4.mp3",
    img: "imgg/img4.jpg",
    singer: "J-soul",
  },
  {
    name: "Touch It",
    path: "music/song5.mp3",
    img: "imgg/img5.jpg",
    singer: "KiDi ft. tyga",
  },
];

//aal function

//function load the track
function load_track(index_no) {
  track.src = All_song[index_no].path;
  title.innerHTML = All_song[index_no].name;
  track_img.src = All_song[index_no].img;
  artist.innerHTML = All_song[index_no].singer;
  track.load();
  total.innerHTML = All_song.length;
  present.innerHTML = index_no + 1;
}
load_track(index_no);
autoplay_switch();


function play_song() {
  if (playing_song == false) {
    playsong();
  } else {
    pausesong();
  }
}

//playsong
function playsong() {
  track.play();
  playing_song = true;
  play_icon.innerHTML = '<i class= "fa fa-pause"></i>';
}

function pausesong() {
  track.pause();
  playing_song = false;
  play_icon.innerHTML = '<i class= "fa fa-play"></i>';
}
//next song
function next_song() {
  if (index_no < All_song.length - 1) {
    index_no += 1;
    load_track(index_no);
    playsong();
    if(timer == 1){
  shuffle_song();
  }
    } 
  else if (autoplay == 0) {
    index_no = 0;
    autoplay_switch();
    load_track(index_no);
    play_song();
  }
   
}
function previous_song() {
  if (index_no > 0) {
    index_no -= 1;
    load_track(index_no);
    play_song();
  } else {
  }
}
function volume_change() {
  volume_show.innerHTML = recent_volume.value;
  track.volume = recent_volume.value / 100;
}

// function change_duration() {
//   slider_position = track.duration * (slider.value / 100);
//   track.currentTime = slider_position;
// }

// function range_slider() {
//   if (track.ended) {
//     play.innerHTML = '<i class= "fa fa-play"></i>';
//     if (autoplay == 1) {
//       index_no += 1;
//       load_track(index_no);
//       play_song();
//     }
//   }
// }

// auto_paly.addEventListener("click", function autoplay_switch() { 
// });
function autoplay_switch() {
  if (autoplay == 0) {
    autoplay = 1;
    auto_paly.style.background = "  rgba(245, 245, 245, 0.2)";
    return autoplay;
  }
  else if (autoplay == 1) {
    autoplay = 0;
    auto_paly.style.background = "rgb(242, 145, 49)";
    
    return autoplay;
  }
}


// shuffle.addEventListener("click", )
function shuffle_song(){
    
      if (timer == 1) {let tot= All_song.length ;
    index_no= Math.ceil(Math.random() * tot);
          timer = 0;
          shuffle.style.background = "  rgba(245, 245, 245, 0.2)";
          load_track(index_no);
          playsong();
          next_song();
          
      }
      else if (timer == 0) {
          timer = 1;
          shuffle.style.background = "rgb(242, 145, 49)";
          return timer;
      }


}
