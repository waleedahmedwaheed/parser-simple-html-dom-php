# Simple HTML DOM Parser

This repository contains a PHP library for parsing HTML documents. It provides an easy-to-use API for manipulating HTML elements, similar to jQuery.

## Requirements

- PHP 5.6 or higher (recommended PHP 7.2 or higher)
- Composer (optional for installation via Composer)

## Installation

### Using Composer

1. Add the package to your composer.json:
    ```bash
    composer require simple-html-dom/simple-html-dom
    ```
### Manual Installation

1. Download the library from GitHub.

2. Include the simple_html_dom.php file in your project:

    ```bash
    include('path/to/simple_html_dom.php');
    ```

### Basic Example

     
     
    include('simple_html_dom.php');

    // Create a DOM object
    $html = file_get_html('http://example.com');

    // Find all images
    foreach($html->find('img') as $element) {
	echo $element->src . '<br>';
    }

    // Find an element by ID
    $element = $html->find('div#specific-id', 0);
    echo $element->innertext;

    // Save the HTML content to a file
    $html->save('output.html');
 
     
 
