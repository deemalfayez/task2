# task2
Design a PHP webpage with a form to input name and age, store the data in a MySQL database, display it in a table, and allow toggling the status between 0 and 1 instantly using AJAX. 

---

Step-by-step :

1. Create a MySQL database named `info`, and inside it create a table called `user` with the columns: `id` (AUTO\_INCREMENT), `name` (VARCHAR), `age` (INT), and `status` (TINYINT DEFAULT 0).
2. In `index.php`, build an HTML form with fields for `name` and `age`, and a submit button that sends data via POST to `insert.php`.
3. In `insert.php`, connect to the database, retrieve the form data, and insert it into the `user` table with default status = 0, then redirect back to `index.php`.
4. In `index.php`, fetch all records from the `user` table and display them in an HTML table below the form.
5. For each row in the table, add a "Toggle" button that calls a JavaScript function to send the user's ID to `toggle.php` using AJAX.
6. In `toggle.php`, receive the user ID, fetch the current status, switch it (from 0 to 1 or 1 to 0), update the table, and return the new status.
7. Use JavaScript to update the status value on the page immediately without refreshing the entire page.

---


