<?php 
require '../conn.php';
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Total number of rows
$sql = "SELECT COUNT(*) FROM contacts";
$result = $conn->query($sql);
$total_rows = $result->fetch_row()[0];
$sql = "select * from contacts order by name limit 20";
$per_page = 20;

// Calculate total number of pages
$total_pages = ceil($total_rows / $per_page);
// Offset for current page
$offset = ($page - 1) * $per_page;

// Fetch contacts for the current page
$sql = "SELECT * FROM contacts order by name LIMIT $offset, $per_page";
$result = $conn->query($sql);
// $contacts = $result->fetch_all(MYSQLI_ASSOC);


while ($row = $result->fetch_assoc()) {


    ?>
<tr class="border-b dark:border-gray-700">
    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <?php echo $row['id'];?>
    </th>
    <td class="px-4 py-3"><?php echo $row['name'];?></td>
    <td class="px-4 py-3"><?php echo $row['email'];?></td>
    <td class="px-4 py-3 max-w-[12rem] truncate"><?php echo $row['phone'];?></td>
    <td class="px-4 py-3"><?php echo $row['address'];?></td>
    <td class="px-4 py-3 flex items-center justify-end">
        <div class="flex items-center space-x-4">
            <a href="/update.php?id=<?php echo $row['id']; ?>"
                class="py-2 px-3 flex pointer items-center text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fill-rule="evenodd"
                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                        clip-rule="evenodd" />
                </svg>
                Edit
            </a>
            <button hx-get="/api/delete.php?id=<?php echo $row['id'];?>" hx-target="#response"
                 hx-confirm="Are you sure you want to delete this contact?"
                class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                </svg>
                Delete
            </button>
        </div>
    </td>
</tr>

<?php 
}

?>