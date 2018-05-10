<html>
    <head>
        <title>Project Invite</title>
        <link media="all" type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:200,300,400,700">
    </head>
    <body>
    <table  border="0" cellpadding="0" cellspacing="0" height="100%" id="bodyTable">
        <tr>
        <!-- CSUN -->
            <td  valign="top" style="background-color: #F3F1F1; height: 400px; padding-left: 40px; padding-right: 40px; padding-bottom: 90px; padding-top: 30px;box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.50)">
                <img style="width:60px;" src="https://auth.csun.edu/cas/images/csun_208_56.png"><span style="margin-bottom: 10px;font-family: Open Sans,Helvetica Neue,Helvetica, Arial, sans-serif; font-weight: 200;font-size:17px;color: #4A4A4A;"><span style="font-size:23px;"> |</span> Faculty</span>
        <!-- End CSUN -->
        <table border="0" cellpadding="0" cellspacing="0" id="emailContainer">
            <td style="background-color: #ffffff; padding-bottom:100px; box-shadow: 0px 1px 1px 0px rgba(118,117,117,0.50);">            
                <img style="width: 500px; clip: rect(0px,500px,120px,0px);background-color:gray; opacity: .8;" src="https://thumbs.dreamstime.com/t/technology-banner-background-old-new-using-computer-circuits-old-machine-cogs-37036025.jpg" alt="">
                    <table border="0" cellpadding="0" cellspacing="0" width="500" id="emailContainer">
                        <h1 style="color:black;font-family: Open Sans,Helvetica Neue,Helvetica, Arial, sans-serif; font-weight: 300;font-size:30px;text-align:center; margin-top:40px;font-size:35px;"> Your project awaits you!  </h1>
                        <h2 id="projectTitle" style="font-family: Open Sans,Helvetica Neue,Helvetica, Arial, sans-serif;color:#D0021B; font-weight:300;font-size:25px;text-align:center;">{{$project->project_title}}</h2>
                        <br>
                        <h1 id="description" style="margin-left:50px;text-align:center;width:400px;color:#4A4A4A; font-family: Open Sans,Helvetica Neue,Helvetica, Arial, sans-serif; font-weight: 200;font-size:15px;">{{$project->abstract}}</h1>
                        <br><br>
                            <a href="{{ urlAppName('/project/' . $project->project_id . '/create/step-1') }}" style="margin-left:170px;background-color:#D0021B; border:1px solid #D0021B;border-radius:3px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:16px;line-height:22px;text-align:center;text-decoration:none;width:150px;-webkit-text-size-adjust:none;mso-hide:all;">View Project</a>
                </td>
            </table>
            </td>
        </tr>
    </table>
    </body>
</html>
