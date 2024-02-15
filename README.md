# PHP Folder Zipping Utility
This PHP script provides a utility function to zip a folder and its contents. It utilizes the ZipArchive class in PHP to create a zip file from a specified source folder. 

## Requirements

- PHP version 5.2 or higher.
- The `zip` extension must be enabled in your PHP configuration.

## Instructions

1. Ensure that the PHP version on your server is compatible.
2. Make sure the `zip` extension is enabled in your PHP configuration.
3. Adjust the `$sourceFolder` and `$destinationZip` variables to the appropriate paths in the script.
4. Optionally, modify the exclusion condition in the loop to omit specific folders or files from being zipped.

## How to Execute

1. Save the provided PHP code into a `.php` file, for example, `zipper.php`.
2. Open a terminal or command prompt.
3. Navigate to the directory containing `zipper.php`.
4. Run the script using the PHP interpreter:

```bash
php zipper.php
```
## Usage

1. Include the `zipFolder` function in your PHP project.
2. Set the `$sourceFolder` variable to the path of the folder you want to zip.
3. Set the `$destinationZip` variable to the desired location and name of the zip file to be created.
4. Execute the script to zip the folder.
5. Adjust the exclusion condition in the loop to omit specific folders or files from being zipped, if needed.

### Example

```php
// Change the Source Path 
$sourceFolder = './';
$destinationZip = './archive.zip';

if (zipFolder($sourceFolder, $destinationZip)) {
    echo 'Folder zipped successfully!';
} else {
    echo 'Failed to zip folder.';
}
```

## Interactions

To execute the script:
1. Make sure the script is saved with a `.php` extension (e.g., `zip_folder.php`).
2. Upload the script to your server or run it locally.
3. Access the script through a web browser or execute it via the command line.
After executing the script, you should see one of the following outputs:

4. If the folder is zipped successfully, it will display `Folder zipped successfully!`.
    - If successful, the script will create a zip file containing the contents of the specified folder.
5. If there's an error during zipping, it will display `Failed to zip folder.` along with any error messages encountered.
  
---

