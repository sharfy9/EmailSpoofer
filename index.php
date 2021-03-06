<?php require_once('./password_protect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Send all the emails!</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- HTML5 Ritch Text Simditor CSS -->
    <link rel="stylesheet" type="text/css" href="simditor/css/simditor.css" />

    <!-- Bootstrap CSS -->
    <!-- If you want to use the CDN insted of the local file, simply uncomment the line below and remove the local link -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="bootstrap-4.0.0/css/bootstrap.min.css">
    <!-- App styles -->
    <link rel="stylesheet" href="style.css">
    <!-- Favicon -->
    <link rel="icon" href="favicon.ico">


</head>

<!-- Background image set here -->

<body style="background-image: url('img/bg.png');">

    <!-- Main container. It is thinner so it's using a col-6 with an offset -->
    <div class="col-md-6 offset-md-3">

        <!-- Icon -->
        <!-- This is a generic icon, in future updates a custom icon would be awesome -->
        <img src="img/icon.png" alt="Icon" class="img-fluid mt-4 mb-4" id="email-icon">
        <!-- Start Form -->
        <form class="form" role="form" autocomplete="off" action="mailer.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <!-- Open Card -->
                <div class="card card-outline-secondary">
                    <!-- Card header -->
                    <div class="card-header">
                        <h1 class="mb-0 text-center">The Ultimate Email Sender</h1>
                        <p class="text-right"><a class="text-danger" href="./?logout">Logout</a></p>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- FROM NAME -->
                        <label for="fromName">From Name</label>
                        <div class="row mb-1">
                            <div class="col-lg-12">
                                <input type="text" name="fromName" class="form-control" data-toggle="tooltip" data-placement="left" title="This is the name that will appear in the FROM field of the sent email" required>
                            </div>
                        </div>

                        <!-- FROM EMAIL -->
                        <label for="fromMail">From Email Address</label>
                        <div class="row mb-1">
                            <div class="col-lg-12">
                                <input type="email" name="fromEmail" class="form-control" data-toggle="tooltip" data-placement="left" title="The sent email will look as if it appeared from this email addrress" required>
                            </div>
                        </div>

                        <!-- TO EMAIL  -->
                        <label for="toMail">To Email Address(s)</label>
                        <div class="row mb-1">
                            <div class="col-lg-12">
                                <input type="email" name="toEmail" class="form-control" data-toggle="tooltip" data-placement="left" title="This is the email address that you want to send the sent email to" required>
                                <p><strong>Pro Tip: </strong> You can send to multiple addresses at once if you seperate each address with a comma</p>

                                <!-- More Options -->
                                <button type="button" class="btn-sm btn-primary mb-3" data-toggle="collapse" data-target="#more-options" id="more-options-btn"><span id="show-more">Show</span> More Sending Options</button>
                                <div class="collapse alert alert-secondary" id="more-options">
                                    <p class="m-0"><strong>Note: </strong> You still want to add at least one "to" address, as many anti-spam filters will discard messages with no "to" field in the header. It does not have to be a real address.</p>
                                    <div class="row">
                                        <div class="col">
                                            <label for="cc">Cc: Email Address(s)</label>
                                            <input type="text" name="cc" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="bcc">Bcc: Email Address(s)</label>
                                            <input type="text" name="bcc" class="form-control">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- SUBJECT LINE  -->
                        <label for="subjectLine">Subject Line</label>
                        <div class="row mb-1">
                            <div class="col-lg-12">
                                <input type="text" name="subjectLine" class="form-control" data-toggle="tooltip" data-placement="left" title="Whatever you type here will appear in the subject line of the sent email" maxlength="50" required>
                            </div>
                        </div>

                        <!-- About Message Body     -->
                        <label>Message Body</label>
                        <p>When crafting your email you have two options: you can either build it using the rich text editor (which will convert the message to HTML) or you can send the message as raw text. While rich text allows more flexibility in how
                            a message can be presented, not all mail clients render HTML correctly or at all. You need to research your target in order to know if the rich text editor is appropriate--when in doubt, use the raw editor.</p>

                        <!-- Message Body Input -->
                        <div class="row mb-1">
                            <div class="col-lg-12">

                                <!-- BS Tabs navigation -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#rich-text" role="tab">Rich Text</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#raw-text" role="tab">Raw Text</a>
                                    </li>
                                </ul>

                                <!-- BS Tab Content -->
                                <div class="tab-content">
                                    <!-- Rich Text Tab -->
                                    <div class="tab-pane active" id="rich-text" role="tabpanel">
                                        <!-- This using the simditor rich text editor. You call this using the id="editor" with a textarea tag and some JS down below-->
                                        <textarea id="editor" name="richMessageText" rows="6" cols="40" class="form-control"></textarea>
                                    </div>

                                    <!-- Raw Text Content -->
                                    <div class="tab-pane" id="raw-text" role="tabpanel">
                                        <textarea name="rawMessageText" rows="12" cols="40" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / message input -->

                        <!-- FILE Attachments -->
                        <div class="row mb-3 mt-3">
                            <!-- <input type="file" name="attachment"> -->
                            <div class="col-12">
                                <strong>File Attachment</strong>
                                <p>You have the option to send an attatchment with your email. Make sure that your webserver php.ini file allows for file uploads, and that the max upload size is set to at least the size of your attatchment. This may be the
                                    case by default, and an error will be presented if it does not work.</p>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="attachment" onchange="fileNameChange()">
                                    <label class="custom-file-label" for="customFile"><span style="font-weight: normal;  font-style: italic;" id="customFileText">Choose file</span></label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /card body -->
                </div>
                <!-- /card -->

                <!-- SUBMIT  -->
                <div class="row">
                    <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-lg mt-3" style="margin:auto; width:100%;" id="submitBtn" name="submit">Send This Email</button>
                    </div>
                    <div class="col-md-6">
                    <a href="./rexords.php" class="btn btn-info btn-lg mt-3" style="margin:auto; width:100%;" id="submitBtn" name="submit">Show Records</a>
                    </div>
                </div>

            </fieldset>
        </form>
        <!-- /form user info -->

    </div>
    <!--/col-->


    <!-- Optional JavaScript -->
    <!-- If you want to use th CDN and not the local jquery file to save space then uncomment the CDN script tags and remove the local script tags. -->

    <!-- JQUERY -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <script src="bootstrap-4.0.0/js/jquery-3.2.1.slim.min.js"></script>

    <!-- BOOTSTRAP -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <script src="bootstrap-4.0.0/js/bootstrap.bundle.min.js"></script>

    <!-- Ritch Text Editor Simditor JS -->
    <script src="simditor/js/module.js"></script>
    <script src="simditor/js/hotkeys.js"></script>
    <script src="simditor/js/uploader.js"></script>
    <script src="simditor/js/simditor.js"></script>

    <!-- Custom Scripts -->
    <script>
        // Required snippit to initalize simditor. It is looking for the ID of the textara as listed above
        var editor = new Simditor({
            textarea: $('#editor')
                //optional options added here
        });

        // Required snippit to initalize the tooltips in Bootstrap
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        // Toggle show more btn text
        // Not sure if this is the ideal way to do this, but it works
        var showMoreOptions = false; // Start with false, because it is hidden by default
        $('#more-options-btn').click(function() { // On click check if var is true or false
            if (!showMoreOptions) {
                // When it expands content switch to hide
                $('#show-more').replaceWith("<span id='show-less'>Hide</span>");
                showMoreOptions = true;
            } else {
                // She collapsed switch to show
                $('#show-less').replaceWith("<span id='show-more'>Show</span>");
                showMoreOptions = false;
            }
        });

        // File Upload change
        function fileNameChange() {
            var fileName = document.getElementById("customFile").files[0].name;
            console.log("User uploaded " + fileName);
            document.getElementById("customFileText").innerHTML = fileName;
        };
    </script>
</body>

</html>