# ScriptKey
ScriptKey is an image-based keyboard for non-encoded alphabetic scripts. This tool aims to enable users to send messages using unencoded scripts and allows for generating a library of symbol images, not only for use in messages, but also for crowdsourcing examples of a script’s use that are required for Unicode standardization.

# How to Use ScriptKey
Changes to ScriptKey's current platform and UI are forthcoming, but it can be used in its current state as follows.

1. In a (macOS) terminal, navigate to the root directory of the repository.
```
cd /path/to/unencoded-keyboards
```
2. Change your working directory to `src/html`.
```
cd src/html
```
3. Create a directory called `img`.
```
mkdir img
```
4. Return to the root directory of the repository and run php -S localhost:43560.
```
cd ../..
php -S localhost:43560
```
5. Open a browser and navigate to `localhost:43560/src/html/`
6. Drawing and adding a character to your keyboard can be done by clicking “Create a Character in the top menu” and clicking send to server. Creating messages using the keyboard can be done on the "Write a Message" page.



