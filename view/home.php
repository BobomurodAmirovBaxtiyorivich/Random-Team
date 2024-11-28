<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row mt-5">
        <form action="/store" method="POST">
            <div class="mb-3">
                <label for="f_n" class="form-label">Enter your full name (First name, second name)</label>
                <input type="text" class="form-control" name="f_n" id="f_n" placeholder="Full name">
            </div>
            <button type="submit" name="sub" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="row mt-3">
        <a href="/create_teams" class="btn btn-primary">Create teams</a>
    </div>
    <div class="row mt-3">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Full name</th>
            </tr>
            </thead>
            <tbody>
            <?php
            global $teams;

            foreach ($teams as $team) {
                ?>
                <tr>
                    <td><?= $team['full_name']?></td>
                </tr>
            <?php }
            ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>