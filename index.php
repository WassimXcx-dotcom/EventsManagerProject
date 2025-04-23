<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System</title>
    <style>
        /* Modern Reset & Fonts */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'IBM Plex Sans', 'Archivo', sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: #2c3e50;
            line-height: 1.6;
            font-weight: 400;
        }

        /* Glassmorphism Navbar */
        nav {
            background: #03314b;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 1.2rem 3.5rem;
            display: flex;
            gap: 32px;
            flex-wrap: wrap;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.25s ease;
            font-size: 1rem;
            position: relative;
        }

        nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -6px;
            left: 0;
            background-color: #f9a826;
            transition: width 0.25s ease;
        }

        nav a:hover {
            color: #f9a826;
        }

        nav a:hover::after {
            width: 100%;
        }

        /* Main Content Styles */
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2.5rem;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .container h1 {
            font-size: 2.8rem;
            color: #03314b;
            font-weight: 600;
            letter-spacing: -0.01em;
            margin-bottom: 1.5rem;
            border-bottom: 3px solid #f9a826;
            display: inline-block;
            padding-bottom: 0.5rem;
        }

        .container p {
            font-size: 1.1rem;
            color: #4a5568;
            margin-bottom: 2.5rem;
            line-height: 1.7;
        }

        /* Features Section */
        .features {
            margin-top: 3rem;
        }

        .features ul {
            list-style: none;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .features li {
            background: white;
            padding: 1.75rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: all 0.25s ease;
            border: 1px solid #e9ecef;
        }

        .features li:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border-color: #03314b;
        }

        .features a {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            text-decoration: none;
            color: #2c3e50;
            font-weight: 500;
            font-size: 1.1rem;
            padding: 1rem;
            transition: all 0.25s ease;
        }

        .features a:hover {
            color: #f9a826;
        }

        .features a::before {
            content: "→";
            margin-right: 12px;
            color: #f9a826;
            font-weight: bold;
            transition: transform 0.25s ease;
        }

        .features a:hover::before {
            transform: translateX(5px);
        }

        /* Footer */
        footer {
            background: #03314b;
            color: white;
            padding: 3rem;
            text-align: center;
            margin-top: 5rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            nav {
                padding: 1rem 1.5rem;
                gap: 20px;
            }
            
            .container {
                margin: 1rem;
                padding: 1.5rem;
            }
            
            .container h1 {
                font-size: 2.2rem;
            }
            
            .features ul {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <nav>
         <a href="/EventsManagerProject/index.php">Home</a>
         <a href="/EventsManagerProject/views/events/create_event.php">Create event</a>
         <a href="EventsManagerProject/views/events/list_events.php">Event List</a>
         <a href="/EventsManagerProject/views/participants/register_participant.php">Add a participant</a>
         <a href="/EventsManagerProject/views/inscriptions/list_inscriptions.php">Inscriptions</a>
    </nav>

    <div class="container">
        <h1>Welcome to the Event Management System</h1>
        <p>This is the main page of the application. Use the navigation menu to explore the features.</p>
        
        <div class="features">
            <ul>
                <li><a href="/EventsManagerProject/views/events/list_events.php">View Events</a></li>
                <li><a href="/EventsManagerProject/views/events/create_event.php">Create New Event</a></li>
                <li><a href="/EventsManagerProject/views/inscriptions/list_inscriptions.php">View Participants</a></li>
            </ul>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 FPK Event Management System. All rights reserved.</p>
    </footer>
</body>
</html>