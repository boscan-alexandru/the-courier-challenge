![the_courier_challenge - repo cover image](https://github.com/boscan-alexandru/the-courier-challenge/blob/main/the_courier_challenge.png?raw=true)

# the-courier-challenge

## Installation

Run the following command from your project root:

```bash
$ composer install
```

## Usage

1. go to the root of your project and open a terminal
2. Run the 'PlayGame.php':
   ```sh
   php PlayGame.php
   ```
   NOTE: The expected behavior is: first the story of the Driver will play out, than the actual game will start. The terminal is actually supposed to write letter by letter (there is no performance issues 😁 ).

## Testing

Run the 'PlayGame.php':

```sh
vendor/bin/phpunit --testdox
```

if there is an issue stating that some of the classes are not found in the current project directory just run `composer dump-autoload ` in the current directory.
