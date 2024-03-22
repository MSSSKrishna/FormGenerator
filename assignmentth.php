<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>



<body>

    <form action="submit.php" method="post" class="initial_form">
        <div>
            <label for="select">Select FormType:</label><br>
            <select id="select" name="select-1">
                <option value="input">Input</option>
                <option value="textarea">Textarea</option>
                <option value="date">Date</option>
                <option value="password">Password</option>
                <option value="number">Number</option>
                <option value="email">Email</option>

            </select><br><br>
            <label for="column_name">Enter Column name:</label>
            <input type="text" name="col_name-1" id="colname">
        </div>
        <button type="button" onclick=addBox() id="add">Add element</button>
        <button type="submit">Submit</button>
    </form>
    <script>
        const addButton = document.querySelector("#add");
        const form = document.querySelector('form');
        let selectCount = 2;

        function addBox() {
            const newFormElement = document.createElement('div');
            newFormElement.innerHTML = `
        <label for="select">Select FormType:</label><br>
        <select id="select" name="select-${selectCount}">

                <option value="input">Input</option>
                <option value="textarea">Textarea</option>
                <option value="date">Date</option>
                <option value="password">Password</option>
                <option value="number">Number</option>
                <option value="email">Email</option>

                </select><br><br>
        <label for="column_name">Enter Column name:</label>
        <input type="text" name="col_name-${selectCount}" id="colname">
        `;
            form.insertBefore(newFormElement, addButton);
            selectCount++;
        }
        // form.addEventListener("submit", (e) => {
        //     e.preventDefault();
        //     form.parentNode.removeChild(form)
        // })
    </script>

</body>

</html>

