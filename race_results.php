<?php
session_start();
$page_title = "Race results";
require('includes/conn_1dt.php');

// Anyone can see this page — no auth_check here. Only logging or
// returning a loan requires being signed in.
$stmt = $pdo->query("SELECT * FROM recent_races");
$recent_races = $stmt->fetchAll();

include('includes/header.php');
include('includes/nav.php');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <h1 class="pt-5 pb-4 text-center">Current loans</h1>

            <?php if (!$recent_races): ?>
                <p class="text-center">No results avalible</p>
            <?php else: ?>
                <div class="pb-4">
                    <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search...">
                </div>
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">race number</th>
                            <th scope="col">race name</th>
                            <th scope="col">winner</th>
                            <th scope="col">Second</th>
                            <th scope="col">third</th>
                        </tr>
                    </thead>
                    <tbody>
                          <?php foreach ($results as $result): ?>
                                <td><?= htmlspecialchars($result['race_number']) ?></td>
                                <td><?= htmlspecialchars($result['race_name']) ?></td>
                                <td><?= htmlspecialchars($result['winner']) ?></td>
                                <td> 
                                </td>
                            </tr>
                        <?php ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>

<script>
    function myFunction() {
        var input, filter, table, tr, i, rowText;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        if (!table) return;
        tr = table.getElementsByTagName("tr");
        for (i = 1; i < tr.length; i++) {
            rowText = tr[i].textContent || tr[i].innerText;
            tr[i].style.display = rowText.toUpperCase().indexOf(filter) > -1 ? "" : "none";
        }
    }
</script>

<?php include('includes/footer.php'); ?>
