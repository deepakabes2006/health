<table width="100%" align="left" border="0" cellspacing="0" cellpadding="0" class="style1" >
    <?php
    foreach ($gradeList as $gradeId => $value) {
        ?>
        <tr class="head">
            <td align="left" class="field" valign="top">
                <div class="checkbox">
                    <input  class="SectionGradeId" <?php if (isset($permissionList[$gradeId])) {
        echo "checked";
    } ?> type="checkbox" onclick="showSection($(this),'<?php echo $gradeId; ?>');"/>
                    <span><label for="SectionCompleted<?php echo $gradeId; ?>"><?php echo $value; ?></label>
                </div>
            </td>
        </tr>
        <tr>
            <td class="checkbox <?php echo $gradeId; ?>" style="display:<?php if (isset($permissionList[$gradeId])) {
        echo "";
    } else {
        echo "none";
    } ?>;">
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr style="height:2px">
                        <td align="left" class="field" id="sectionList" valign="top">
    <?php
    foreach ($subjectList[$gradeId] as $subjectId => $value) {
        ?>
                                <div class="checkbox <?php echo $gradeId; ?>" style="width:100%;display:<?php if (isset($permissionList[$gradeId])) {
            echo "";
        } else {
            echo "none";
        } ?>;background:#424242;color:white;font-weight:bold;">
                                    <input <?php if (isset($permissionList[$gradeId][$subjectId])) {
            echo "checked";
        } ?> class="chapterBox"  type="checkbox" name="data[PartnerGradeSubjectMap][gradeIds][]" 
                                                                                                                       value="<?php echo $gradeId . "~~" . $subjectId; ?>" />					
                                    &nbsp;&nbsp;<label ><?php echo $value; ?></label>
                                </div>

    <?php } ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr><td style="height:1px;"></td></tr>
<?php } ?>
    <tr>
        <td align="center" class="field" id="subjectList"><input type="submit" name="submit"  value="Grant Access"></td>
    </tr>
</table>