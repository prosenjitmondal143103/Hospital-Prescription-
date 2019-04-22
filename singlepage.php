<!DOCTYPE html>
<html>
<head>
<script>
    function hideParagraph() {
        var x = document.getElementById("paragraph");
        var x1 = document.getElementById("paragraph1");
        if (x.style.display == "none" ) {
                x.style.display = "block";
                x1.style.display = "none";

        }

        else {
                x.style.display = "block" ;

        }
    }

    function hideParagraph1() {
        var x = document.getElementById("paragraph");
        var x1 = document.getElementById("paragraph1");
        if (x1.style.display == "none" ) {
            x1.style.display = "block";
            x.style.display = "none";

        }

        else {
            x1.style.display = "block" ;


        }
    }

</script>
<style>
     p{
        text-align: justify;
        padding: 5px;


    }
     ul {
         list-style-type: none;
         margin: 0;
         padding: 0;
         overflow: hidden;
         background-color: #333;
     }

     li {
         float: left;
         padding: 10px;
     }
     button{
         padding: 4px 8px ;
         margin: 0px;
     }


     .footer {
         margin: auto;
         overflow: hidden;
         width: 100%;
         background-color: black;
         color: white;
         text-align: center;
         padding: 10px;
     }

</style>
</head>

<body>
<ul>
    <li><button onclick="hideParagraph()">Home</button></li>
    <li><button onclick="hideParagraph1()">About</button></li>
</ul>

<p id="paragraph"  >Home page<br>Lorem Ipsum is simply dummy text of the printing and typesetting
     industry. Lorem Ipsum has been the industry's standard dummy text
      ever since the 1500s, when an unknown printer took a galley of
      type and scrambled it to make a type specimen book. It has survived
      not only five centuries, but also the leap into electronic
      typesetting, remaining essentially unchanged. It was popularised
       in the 1960s with the release of Letraset sheets containing Lorem
        Ipsum passages, and more recently with desktop publishing software
        like Aldus PageMaker including versions of Lorem Ipsum.</p>



    <p id="paragraph1" style="color: red; display: none;" >About page<br>Lorem Ipsum is simply dummy text of the printing and typesetting
    industry. Lorem Ipsum has been the industry's standard dummy text
    ever since the 1500s, when an unknown printer took a galley of
    type and scrambled it to make a type specimen book. It has survived
    not only five centuries, but also the leap into electronic
    typesetting, remaining essentially unchanged. It was popularised
    in the 1960s with the release of Letraset sheets containing Lorem
    Ipsum passages, and more recently with desktop publishing software
    like Aldus PageMaker including versions of Lorem Ipsum.</p>

<div class="footer">
    <?php require 'inc/footer-text.php'; ?>
</div>
</body>
</html>