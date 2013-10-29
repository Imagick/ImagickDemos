<?php




Given a sequence of images all the same size, such as produced by -coalesce, replace the second and later images, with a smaller image of just the area that changed relative to the previous image.

The resulting sequence of images can be used to optimize an animation sequence, though will not work correctly for GIF animations when parts of the animation can go from opaque to transparent.