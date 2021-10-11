Hald CLUT Read me.

Thees tools and examples are provided "as is" but if you do have problems, find bugs, have questions or sugestions please mail eskil@obsession.se

Nore infor can be found at www.quelsolaar.com


There are four simple comand-line programs with source in this archive:

HaldCLUT_create:

Creates a identity CLUT of any level (if none is give a level 16 CLUT will be created weighing in at 50Mb)

HaldCLUT_correct:

Takes a CLUT and a image and corrects the image using the CLUT. Both images must be uncompressed TARGA. (note that many of my exaples have been saved PNG due to size, so you need to convert them if you what to play with them).

HaldCLUT_fun:

Is a collection of functions if you would like to atempt to program your own color corrections.

HaldCLUT_viewer:

Is a simple GLUT/GL application that draws a 3D view of the CLUT. Use the SPACE BAR to toggle draw mode. Bres + or - to increase or decrese the sesolution of the color cube.

Thees appliactions are under the FreeBSD license ad you are free to use them to what ever as long as you give credit. If you include suport for Hald in any application of service pleas mail me so that i can link to your work.