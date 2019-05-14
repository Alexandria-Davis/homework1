<!DOCTYPE html>
<html lang=en>
    <head>
    <?php
    session_start();
        include_once "Pagetools/head.php";
    ?>
    </head>
    <body>
        <?php
            $page = "home";
            include_once "Pagetools/nav.php";
        ?>
        <input type=hidden id="uid" value=<?php echo $_SESSION["user"] ?>>
        <div class="invite">
            <label for="Invintation_link">Invitation Link</label>
            <input type="text" class="linkbox" name="Invintation_link"/>
            <button type="button">copy</button>
        </div>
        <div>
            <a href="add_event.php">Add Appointment Slot</a>
        </div>
        <table id="event_table">
            <tr>
                <th>date</th>
                <th>
                    Start time
                </th>
                <th>
                    End time
                </th>
                <th>
                    Booked by
                </th>
                <th>
                    Details
                </th>
                <th>
                    
                </th>
                <th></th>
            </tr>
        </table>
        
    </body>
    <script type="text/javascript" src="js/dashboard.js"></script>
</html>