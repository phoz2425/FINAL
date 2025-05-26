<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WST Final Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
        .btn-hover {
            transition: transform 0.2s, background-color 0.3s;
        }
        .btn-hover:hover {
            transform: scale(1.05);
            background-color: #00ffc6;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-[#0f2027] via-[#203a43] to-[#2c5364] min-h-screen flex flex-col items-center justify-center text-gray-100 font-sans">
    <header class="w-full max-w-4xl mx-auto py-6 fade-in">
        <h1 class="text-4xl font-bold text-center mb-2">WST Final Project</h1>
        <nav class="flex justify-center space-x-4">
            <a href="index.php" class="text-lg text-teal-300 hover:text-teal-100 transition-colors">Home</a>
            <a href="team.html" class="text-lg text-teal-300 hover:text-teal-100 transition-colors">Team</a>
        </nav>
        <h2 class="text-2xl text-center mt-4">BSIT 3A-G2</h2>
    </header>

    <main class="w-full max-w-4xl mx-auto fade-in">
        <section class="bg-gray-800 rounded-lg shadow-lg p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">List of Students</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-teal-600 text-black">
                            <th class="p-3">ID</th>
                            <th class="p-3">Name</th>
                            <th class="p-3">Course</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $xml = new DOMDocument();
                        $xml->load('students.xml');
                        $students = $xml->getElementsByTagName('student');
                        foreach ($students as $stud) {
                            $id = $stud->getElementsByTagName('id')->item(0)->nodeValue;
                            $name = $stud->getElementsByTagName('name')->item(0)->nodeValue;
                            $course = $stud->getElementsByTagName('course')->item(0)->nodeValue;
                            echo "<tr class='border-b border-gray-700 hover:bg-gray-700 transition-colors'>";
                            echo "<td class='p-3'>$id</td>";
                            echo "<td class='p-3'>$name</td>";
                            echo "<td class='p-3'>$course</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="flex justify-center space-x-4">
            <a href="add.php" class="bg-teal-500 text-black px-6 py-3 rounded-lg btn-hover font-semibold">Add New</a>
            <a href="delete.php" class="bg-teal-500 text-black px-6 py-3 rounded-lg btn-hover font-semibold">Delete</a>
            <a href="update.php" class="bg-teal-500 text-black px-6 py-3 rounded-lg btn-hover font-semibold">Search / Update</a>
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.fade-in');
            elements.forEach((el, index) => {
                el.style.animationDelay = `${index * 0.2}s`;
            });
        });
    </script>
</body>
</html>
