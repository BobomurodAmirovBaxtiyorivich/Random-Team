<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Random team</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row mt-5">
        <form action="/store" method="POST">
            <div class="mb-3">
                <label for="f_n" class="form-label">Enter your full name (First name, second name)</label>
                <input type="text" class="form-control" name="f_n" id="f_n" placeholder="Full name" required>
            </div>
            <button type="submit" name="sub" class="btn btn-primary">Add</button>
        </form>
    </div>
    <div class="row mt-3">
        <form action="/create" method="POST">
            <div class="mb-3">
                <label for="count" class="form-label">Enter how many members should be in each team</label>
                <input type="number" class="form-control" name="count" id="count" placeholder="Enter how many members should be in each team" required>
            </div>
            <button type="submit" name="sub_team" class="btn btn-success">Create teams</button>
        </form>
    </div>
    <div class="row mt-3">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Full name</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            global $teams;

            $i = 1;
            foreach ($teams as $team) {
                ?>
                <tr>
                    <td><?= $i . ' ' . htmlspecialchars($team['full_name']) ?></td>
                    <td>
                        <a href="/delete?id=<?= htmlspecialchars($team['id']) ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php
                $i++;
            }
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