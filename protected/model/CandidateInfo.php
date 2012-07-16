<?php
/*
 * this is an alias to Seeker model to prevent any confliction in relation
 * between: 'seeker apply to vac.' and 'seeker is_a Candidate to vac.'
 */
Doo::loadModel('Seeker');
class CandidateInfo extends Seeker{
}
?>
