import React from 'react'
import { Image, StyleSheet, View, Text } from 'react-native'
import { logo } from '../../assets'
import { colors } from '../theme'

export default function Headerlogo() {
  return (
    <View
      style={[
        styles.container,
        { backgroundColor: colors.warnaFont, paddingVertical: 20 },
      ]}
    >
      <Image
        source={logo} // Sesuaikan path dengan lokasi gambar Anda
        style={styles.logo}
      />
      <Text
        style={{
          color: 'white',
          fontSize: 20,
          fontWeight: 'bold',
          textTransform: 'uppercase',
        }}
      >
        Fima Beauty Aesthetic
      </Text>
    </View>
  )
}

const styles = StyleSheet.create({
  container: {
    justifyContent: 'center',
    alignItems: 'center',
    flexDirection: 'row',
  },
  logo: {
    width: 70, // Sesuaikan lebar logo
    height: 70, // Sesuaikan tinggi logo
    marginRight: 10, // Memberikan jarak antara logo dan teks
  },
})
