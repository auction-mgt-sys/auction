<!-- Masthead -->
<?php
include('db_connect.php');

if (isset($_SESSION['login_id'])) {
?>

<div class="container-fluid d-flex h justify-content-center">

    <?php
    $owner = $_SESSION['login_id'];
    ?>

    <div class="col-lg-12 ">

        <div class="row">
            <!-- FORM Panel -->

            <!-- Table Panel -->
            <div class="col-md-12">

                <br>

                <div class="card">
                    <div class="card-header">
                        <b>Your Inbox</b>
                        <span class="float:right">
                            <a class="btn-block btn-sm col-sm-1 float-right c" href="index.php?page=sent_notification" id="new_product">
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        </span>
                        <span class="float:right">
                            <a class="btn-block btn-sm col-sm-1 float-right c" href="index.php?page=write_comment" id="new_product">
                                <i class="fa fa-plus"></i>
                            </a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table table-condensed table-bordered table-hover">
                            <?php
                            $i = 0;
                            $users = $conn->query("SELECT * FROM comment WHERE user_type = 2 ORDER BY 'date' DESC");
                            while ($row = $users->fetch_assoc()) {
                                $i++;
                                $get = $conn->query("SELECT * FROM users WHERE id =" . $row['sender_id'] . " ORDER BY 'date' DESC LIMIT 1");
                                $uname = $get->num_rows > 0 ? $get->fetch_array()['name'] : '';
                            ?>
                                <a style="<?php if ($row['status'] == 'unread') {
                                                echo "font-weight:bold; font-size: 20px;";
                                            } ?>" class="dropdown-item view_detail" href="javascript:void(0)" data-id='<?php echo $row['id'] ?>'>
                                    <small><i><?php echo date('F j, Y, g:i a', strtotime($row['date'])) ?></i></small><br>
                                    <?php echo $row['title']; ?><br>
                                    <small><i><?php echo 'From:- ' . $uname ?></i></small><hr>
                                </a>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Table Panel -->
        </div>
    </div>

</div>

<?php } ?>