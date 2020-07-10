<?php

namespace WPML\ST\MO\JustInTime;

use NOOP_Translations;
use WPML\ST\MO\LoadedMODictionary;

class MO extends \MO {

	/** @var LoadedMODictionary $loaded_mo_dictionary */
	private $loaded_mo_dictionary;

	/** @var string $locale */
	protected $locale;

	/** @var string $domain */
	private $domain;

	/**
	 * @param LoadedMODictionary $loaded_mo_dictionary
	 * @param string             $locale
	 * @param string             $domain
	 */
	public function __construct(
		LoadedMODictionary $loaded_mo_dictionary,
		$locale,
		$domain
	) {
		$this->loaded_mo_dictionary = $loaded_mo_dictionary;
		$this->locale               = $locale;
		$this->domain               = $domain;
	}

	/**
	 * @param string $singular
	 * @param string $context
	 *
	 * @return string
	 */
	public function translate( $singular, $context = null ) {
		$this->load();
		return _x( $singular, $context, $this->domain );
	}

	/**
	 * @param string $singular
	 * @param string $plural
	 * @param int    $count
	 * @param string $context
	 *
	 * @return string
	 */
	public function translate_plural( $singular, $plural, $count, $context = null ) {
		$this->load();
		return _nx( $singular, $plural, $count, $context, $this->domain );
	}

	private function load() {
		$loaded = $this->loadTextDomain();

		if ( ! $loaded ) {
			/**
			 * If we could not load at least one MO file,
			 * we need to assign the domain with a `NOOP_Translations`
			 * object on the 'l10n' global.
			 * This will prevent recursive loop on the current object.
			 */
			$GLOBALS['l10n'][ $this->domain ] = new NOOP_Translations();
		}
	}

	protected function loadTextDomain() {
		return $this->loaded_mo_dictionary
			->getFiles( $this->domain, $this->locale )
			->reduce(
				function( $loaded, $mofile ) {
					$last_loaded = load_textdomain( $this->domain, $mofile );
					return $loaded || $last_loaded;
				},
				false
			);
	}
}
