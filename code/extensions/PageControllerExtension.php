<?php
class PageControllerExtension extends Extension {

  public static $EQUALS = "=";

  public function httpHeader($name, $value) {
    header($name . ": " . $value, false);
    // Can't use this as addHeader() replaces headers of the same name
    // $this->owner->response->addHeader($name, $value);
  }

  public function httpDNSPrefetch() {
    foreach (func_get_args() as $value) {
      self::httpHeader("link", "<" . $value . ">; rel=dns-prefetch");
    }
  }

  public function httpPrefetch() {
    foreach (func_get_args() as $value) {
      self::httpHeader("link", "<" . $value . ">; rel=prefetch");
    }
  }

  public function httpPreconnect() {
    foreach (func_get_args() as $value) {
      self::httpHeader("link", "<" . $value . ">; rel=preconnect; crossorigin");
    }
  }

  public function httpPreload() {
    foreach (func_get_args() as $value) {
      self::httpHeader("link", "<" . $value . ">; rel=preload");
    }
  }

  public function httpPrerender() {
    foreach (func_get_args() as $value) {
      self::httpHeader("link", "<" . $value . ">; rel=prerender");
    }
  }

}
