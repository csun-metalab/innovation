<html>
    <head>
        <title>Project Invite</title>
        <link media="all" type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:200,300,400,700">
    </head>
    <body>
    <table  border="0" cellpadding="0" cellspacing="0" height="100%" id="bodyTable">
        <tr>
            <td  valign="top" style="background-color: #F3F1F1; height: 400px; padding-left: 40px; padding-right: 40px; padding-bottom: 40px; padding-top: 30px;box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.50)">
                <img style="width:60px;" src="https://auth.csun.edu/cas/images/csun_208_56.png"><span style="margin-bottom: 10px;font-family: Open Sans,Helvetica Neue,Helvetica, Arial, sans-serif; font-weight: 200;font-size:17px;color: #4A4A4A;"><span style="font-size:23px;"> |</span> Faculty</span>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name=”x-apple-disable-message-reformatting”>
    <title></title>
    <link href='https://fonts.googleapis.com/css?family=Lato:200,300,400,700' rel='stylesheet' type='text/css'>
    <style>

        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }
        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        /* What it does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin:0 !important;
        }
        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }
        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode:bicubic;
        }
        /* What it does: A work-around for iOS meddling in triggered links. */
        .mobile-link--footer a,
        a[x-apple-data-detectors] {
            color:inherit !important;
            text-decoration: underline !important;
        }

    </style>

    <!-- Progressive Enhancements -->
    <style>
        /* What it does: Hover styles for buttons */
        /* Media Queries */
        @media screen and (max-width: 480px) {

            /* What it does: Forces elements to resize to the full width of their container. Useful for resizing images beyond their max-width. */
            .fluid,
            .fluid-centered {
                width: 100% !important;
                max-width: 100% !important;
                height: auto !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            /* And center justify these ones. */
            .fluid-centered {
                margin-left: auto !important;
                margin-right: auto !important;
            }
            /* What it does: Forces table cells into full-width rows. */
            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
            }
            /* And center justify these ones. */
            .stack-column-center {
                text-align: center !important;
            }
            /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
            .center-on-narrow {
                text-align: center !important;
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
            }
            table.center-on-narrow {
                display: inline-block !important;
            }
        }

    </style>
</head>
<body width="100%" bgcolor="#ffffff" style="margin: 0;">
    <center style="width: 100%; background: #FFFFFF;">
        <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;">
        <!-- this text will show in email preview but not in email body  -->
        <!-- for questions regarding rwards and proejcts email research@csun.edu
        To report techincal issues submit feedback to META+Lab (link to route) -->
        </div>
        <div style="max-width: 680px; margin: auto;">
          <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 680px;">
            <tr>
              <td bgcolor="#ffffff">
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                  <tr>
                    <td style="padding: 40px; font-weight: 300; text-align: center; font-family: sans-serif; font-size: 26px; mso-height-rule: exactly; color: #000000;">
                       The student, {{ $student_form['name'] }}, is requesting to be part of your project:
                        <!-- Button : BEGIN -->
                        <br />
                        <br />
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto">
                          <tr>
                            <td id="projectTitle" style="color:#D0021B; font-weight:300;font-size:22px;text-align:center;width:470px;">"{{ $project->project_title }}"
                            </td>
                          </tr>
                        </table>
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto">
                          <tr>
                            <td style="padding: 47px 40px 0px 40px; font-weight: 100; font-family: sans-serif; font-size: 19px; mso-height-rule: exactly; color: #3a3a3a;">Message:
                            </td>
                          </tr>
                          <tr>
                            <td style="padding: 20px 40px 40px 40px; font-weight: 100; text-align: center; font-family: sans-serif; font-size: 18px; mso-height-rule: exactly; color: #555555;">{{$student_form['message']}}
                            </td>
                          </tr>
                          <tr>
                            <td style="padding: 20px 40px 40px 40px; font-weight: 500; text-align: center; font-family: sans-serif; font-size: 17px; mso-height-rule: exactly; color:#000000;">Reply to the student at: <a href=mailto:"{{$student_form['email']}}">  {{$student_form['email']}}</a>
                            </td>
                          </tr>
                        </table>
                          <img style="width:90px;margin-right:0px;float:right;" src="http://cdn.metalab.csun.edu/logos/RGS-Vertical-186-Black.png">
                        <br>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </div>
    </center>
</body>
<br />
<span>
<center>For questions regarding rewards and projects, please email research@csun.edu</center></span>
      <span><center>For technical problems, <a class="btn--feedback" href="{{ $feedbackurl }}">submit feedback to META+LAB</a></center></span>
</html>
