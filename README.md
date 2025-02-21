# Hosting Checker Tool

This project provides a simple web-based tool to check the hosting information of a given domain. It utilizes a combination of HTML, CSS, JavaScript (for the frontend and user interaction) and PHP (for the backend to resolve the domain and fetch IP information).  It uses the `ip-api.com` API to retrieve geolocation and ISP/organization data.

## Features

*   **Domain Input:** Users can enter a domain name (e.g., `example.com`).
*   **Hosting Information:** Displays the following information about the entered domain:
    *   IP Address
    *   Location (City, Region, Country)
    *   Hosting Provider (ISP)
    *   Organization
*   **Error Handling:**  Provides user-friendly error messages for invalid domains, failed resolution, and API errors.
*   **Loading Indicator:** Shows a loading spinner while fetching information.
*   **Responsive Design:** Adapts to different screen sizes (desktop, tablet, mobile).
*   **Dark Mode Support:**  Respects the user's system preference for dark mode.
*   **Clean UI:** Uses a modern, minimalistic design for ease of use.

## Technologies Used

*   **HTML:** Structure of the web page.
*   **CSS:** Styling and layout, including responsiveness and dark mode.
*   **JavaScript:**
    *   Handles user input (domain entry, button clicks, Enter key press).
    *   Makes asynchronous requests (using `fetch`) to the PHP backend.
    *   Updates the UI with the results or error messages.
    *   Manages the display of loading indicators, results, and error sections.
*   **PHP:**
    *   Receives the domain name from the JavaScript frontend.
    *   Validates the domain name using regular expressions (`preg_match`).
    *   Resolves the domain to an IP address using `gethostbyname()`.
    *   Fetches geolocation and ISP/organization details using `ip-api.com`.
    *   Returns the results as a JSON object to the frontend.
    *   Includes error handling (try-catch block) for potential exceptions.

## Setup and Installation

1.  **Clone the repository:**

    ```bash
    git clone https://github.com/DreamyMonk/Hosting-Checker
    cd <repository_directory>
    ```

2.  **Web Server:** You need a web server with PHP support (e.g., Apache, Nginx, XAMPP, MAMP, WAMP).  Place the files (`index.html` and `check_domain.php`) in the web server's document root (e.g., `htdocs` for XAMPP, `/var/www/html` for many Linux setups).  Make sure the PHP file has execute permissions.

3.  **Access the Tool:** Open your web browser and navigate to the URL where you placed the files.  For example, if you're using XAMPP and placed the files in `htdocs`, you would typically access it via `http://localhost/` (or whatever directory you put the project files in).

## How to Use

1.  **Enter a Domain:**  Type the domain name you want to check into the input field (e.g., `google.com`, `example.org`).  Do *not* include `http://` or `https://`.
2.  **Click "Check":** Press the "Check" button or press the Enter key.
3.  **View Results:** The tool will display the IP address, location, hosting provider, and organization of the domain. If there's an error (e.g., invalid domain, unable to resolve), an error message will be shown.

## API Usage (ip-api.com)

This project uses the [ip-api.com](http://ip-api.com) API.  It's a free API, but be aware of their usage limits (see their documentation).  If you exceed the limits, you might get rate-limited or receive incorrect data.  For production use, consider:

*   **Caching:** Implement caching of results to reduce API calls (e.g., using a database or a simple file-based cache).
*   **API Key:**  While not required for basic usage, ip-api.com *may* offer API keys for higher usage limits or more features. Check their documentation.
*   **Alternative APIs:** If you need more robust features, higher rate limits, or different data, consider alternative IP geolocation APIs (e.g., MaxMind GeoIP, IP2Location). You would need to modify the PHP code to use a different API.

## Contributing

Contributions are welcome! If you find any bugs or have suggestions for improvements, please open an issue or submit a pull request.  Follow standard Git practices (fork, branch, commit, pull request).

## License

This project is open-source and available under the [MIT License](LICENSE) (you'll need to create a `LICENSE` file and put the MIT license text in it). This allows for free use, modification, and distribution.
