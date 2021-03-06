<?php

namespace mageekguy\atoum\deprecated;

class rescorer
{
	/**
	 * @param \mageekguy\atoum\test\score $score
	 *
	 * @return \mageekguy\atoum\test\score
	 */
	public function rescore(\mageekguy\atoum\test\score $score)
	{
		foreach ($score->getErrors() as $key => $error) {
			if (!($error['type'] & E_USER_DEPRECATED)) {
				continue;
			}
			$score->deleteError($key);

			$score->addOutput($error['file'], $error['class'], $error['method'], $error["message"]);
		}

		return $score;
	}
}
