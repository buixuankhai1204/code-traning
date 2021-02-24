<?php 



    interface MediaPlayer{
        function play($audio_type,$name);
    }

    class AudioPlayer implements MediaPlayer{
        public $audioPlayer;
        
        
        public function play($audio_type,$name){
            if($audio_type=="mp3"){
                echo"Playing mp3 file. Name:" . $name;
            }elseif($audio_type=="vlc"||$audio_type=="mp4"){
                $this->audioPlayer=new MediaAdapter($audio_type);
                $this->audioPlayer->play($audio_type,$name);
                
            }else{
                 echo "invaid media ".$audio_type ."format not support";
            }
        }
    }
    class MediaAdapter implements MediaPlayer{
        private advancedMediaPlayer $mediaAdapter;
        public function MediaAdapter($type){
            if($type=="vlc"){
                $this->mediaAdapter=new VLCplayer();
            }elseif($type=="mp4"){
                $this->mediaAdapter= new MP4player();
            }else{
            }
        }
        public function play($audio_type,$name){
            if($audio_type=="vlc"){
                $this->mediaAdapter->playVLC($name);
            }elseif($audio_type=="mp4"){
                $this->mediaAdapter->playMP4($name);
            }
        }
    }

    interface advancedMediaPlayer{
        function playVLC($name);
        function playMP4($name);
    }

    class VLCplayer implements advancedMediaPlayer{


        public function playVLC($name)
        {
            echo"Playing vlc file. Name: ".$name;
        }
        
        public function playMP4($name)
        {
            //
        }
    }

    class MP4player implements advancedMediaPlayer{

        public function playVLC($name)
        {
            
        }

        public function playMP4($name)
        {
           echo "Playing vlc file. Name: ".$name; 
        }
    }


     $audioPlayer = new AudioPlayer();

      $audioPlayer->play("mp3", "beyond the horizon.mp3");
      $audioPlayer->play("mp4", "alone.mp4");
      $audioPlayer->play("vlc", "far far away.vlc");
      $audioPlayer->play("avi", "mind me.avi");


    



