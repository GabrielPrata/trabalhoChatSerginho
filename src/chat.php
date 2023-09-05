<?php
if (!isset($_SESSION)) {
    session_start();
}

$validado = $_GET['veioForm'];

if (!isset($validado) or $validado != 1) {
    echo '<script type="text/javascript">
        alert("Bota um nome e uma cor nessa merda, filho da puta. Ta achando que essa merda aqui é bagunça é???");
        history.back()
    </script>';
    die();
} else {

    if (!isset($_POST['txt_nome'])) {
        $_POST['txt_nome'] = "COLOCA UM NOME SEU ANIMAL";
    }

    if (!isset($_POST['color'])) {
        $_POST['color'] = "#000";
    }

    $nome = $_POST['txt_nome'];
    $cor = $_POST['color'];

    $_SESSION['nome'] = $nome;
    $_SESSION['color'] = $cor;



?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
        <link rel="stylesheet" href="../css/mdb.min.css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/chat.js"></script>
        <title>Document</title>
        <script type="text/javascript">
            var name = "<?php echo $nome; ?>";

            // strip tags
            name = name.replace(/(<([^>]+)>)/ig, "");
            name = name + ": ";
            // display name on page
            $("#name-area").html("You are: <span>" + name + "</span>");

            // kick off chat
            var chat = new Chat();
            $(function() {

                chat.getState();

                // watch textarea for key presses
                $("#sendie").keydown(function(event) {

                    var key = event.which;

                    //all keys including return.  
                    if (key >= 33) {

                        var maxLength = $(this).attr("maxlength");
                        var length = this.value.length;

                        // don't allow new content if length is maxed out
                        if (length >= maxLength) {
                            event.preventDefault();
                        }
                    }
                });
                // watch textarea for release of key press
                $('#sendie').keyup(function(e) {

                    if (e.keyCode == 13) {

                        var text = $(this).val();
                        var maxLength = $(this).attr("maxlength");
                        var length = text.length;

                        // send 
                        if (length <= maxLength + 1) {

                            chat.send(text, name);
                            $(this).val("");

                        } else {

                            $(this).val(text.substring(0, maxLength));

                        }


                    }
                });

                $('#botaoEnvia').click(function(e) {
                    preventDefault();
                    var text = $('#sendie').val();
                    var maxLength = 9999;
                    var length = text.length;

                    // send 
                    if (length <= maxLength + 1) {
                        chat.send(text, name);
                        $('#sendie').val("");

                    } else {

                        $('#sendie').val(text.substring(0, maxLength));

                    }


                });

            });
        </script>
    </head>

    <body onload="setInterval('chat.update()', 1000)">


        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card" id="chat1" style="border-radius: 15px; height: 80% !important; margin: 5% 0%;">
                    <div class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                        <i class="fas fa-angle-left"></i>
                        <p class="mb-0 fw-bold">Chat do Serginho inho</p>
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="card-body" style="overflow-y: scroll; height: 500px;">
                        <div id="optCamp1" class="ocult">
                            <div id="page-wrap">
                                <p id="name-area"></p>

                                <div class="d-flex flex-row justify-content-start mb-4">
                                    <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;"> -->
                                    <!-- <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);"> -->
                                        
                                            <div id="chat-area"></div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form id="send-message-area">
                        <div class="form-outline">
                            <textarea class="form-control" id="sendie" maxlength='9999' rows="4"></textarea>
                            <label class="form-label" for="textAreaExample">Solta o verbo</label>
                        </div>
                    </form>
                    </div>
                    
                    <!-- <button id="botaoEnvia">Enviar</button> -->
                </div>
            </div>
            <script type="text/javascript" src="../js/mdb.min.js"></script>
    </body>

    </html>
<?php
}
?>