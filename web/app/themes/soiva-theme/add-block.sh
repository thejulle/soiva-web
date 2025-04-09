#!/bin/sh

##
# Variables
##
BLOCKSDIR=blocks/
BLOCKSTYLESDIR=assets/styles/blocks/
GUTENBERGSETTINGS=lib/gutenberg-settings.php
EDITORSCSS=assets/styles/editor.scss
MAINSCSS=assets/styles/main.scss

# Ask user input for block title, defaults to 'Example block'
read -p 'Insert block title [Example block]: ' BLOCKTITLE
BLOCKTITLE=${BLOCKTITLE:-"Example block"}

# Ask user input for block selector, defaults to 'example-block'
read -p 'Insert block selector [example-block]: ' BLOCKSELECTOR
BLOCKSELECTOR=${BLOCKSELECTOR:-"example-block"}

# Ask user to confirm before proceeding
echo "\nBlock title: $BLOCKTITLE"
echo "Block selector: $BLOCKSELECTOR"
read -p 'Proceed? (y/n) ' PROCEED

if [ "$PROCEED" != "${PROCEED#[Yy]}" ] ;then

# Create folder for the block inside /blocks
mkdir -p ${BLOCKSDIR}${BLOCKSELECTOR}

##
# Create block register file
##
echo "{
  \"name\": \"$BLOCKSELECTOR\",
  \"title\": \"$BLOCKTITLE\",
  \"description\": \"$BLOCKTITLE.\",
  \"category\": \"custom-blocks\",
  \"icon\": \"align-none\",
  \"keywords\": [],
  \"acf\": {
    \"mode\": \"preview\",
    \"renderTemplate\": \"$BLOCKSELECTOR.php\"
  },
  \"supports\": {
    \"align\": false
  }
}" > ${BLOCKSDIR}${BLOCKSELECTOR}/block.json


# Output what's been done
echo "\nCreated: $BLOCKSDIR$BLOCKSELECTOR/block.json"

##
# Create block template file
##
echo "<?php
/**
 * Block: $BLOCKTITLE
 */

\$data = '';
// \$data = get_field('data');

if (\$data) :
  ?>
    <div class=\"block $BLOCKSELECTOR\">
      <?php
        /*
        foreach (\$data as \$row) :
          // Build amazing things with data
        endforeach;
        */
      ?>
    </div>
  <?php
endif;" > ${BLOCKSDIR}${BLOCKSELECTOR}/${BLOCKSELECTOR}.php

# Output what's been done
echo "Created: $BLOCKSDIR$BLOCKSELECTOR/$BLOCKSELECTOR.php"

##
# Create block SCSS file
##
echo ".$BLOCKSELECTOR {

}" > ${BLOCKSTYLESDIR}_${BLOCKSELECTOR}.scss

# Output what's been done
echo "Created: ${BLOCKSTYLESDIR}_${BLOCKSELECTOR}.scss"

##
# Add to allowed blocks, lib/gutenberg-settings.php after 'acf/hero'
##
sed -i.bak '/\acf\/hero/ {a\
\ \ $blocks[] = '\''acf/'"${BLOCKSELECTOR}"''\'';
}' $GUTENBERGSETTINGS && rm $GUTENBERGSETTINGS.bak

# Output what's been done
echo "Added to allowed blocks in: $GUTENBERGSETTINGS"

##
# Add to editor.scss file, after 'blocks/hero'
##
sed -i.bak '/\blocks\/hero/ {a\
\ \ @import "blocks/'"${BLOCKSELECTOR}"'";
}' $EDITORSCSS && rm $EDITORSCSS.bak

# Output what's been done
echo "SCSS file included in: $EDITORSCSS"

##
# Add to main.scss file, after 'blocks/hero'
##
sed -i.bak '/\blocks\/hero/ {a\
@import "blocks/'"${BLOCKSELECTOR}"'";
}' $MAINSCSS && rm $MAINSCSS.bak

# Output what's been done
echo "SCSS file included in: $MAINSCSS"

else

# User didn't wan't to proceed
echo "\nMission aborted."

fi
