import React, { useEffect, useState, useContext, useLayoutEffect } from 'react'
import {
  Text,
  View,
  ScrollView,
  StyleSheet,
  TouchableOpacity,
  Image,
} from 'react-native'
import { useNavigation } from '@react-navigation/native'
import IconButton from '../../components/IconButton'
import ScreenTemplate from '../../components/ScreenTemplate'
import Button from '../../components/Button'
import { firestore } from '../../firebase/config'
import { doc, onSnapshot } from 'firebase/firestore'
import { colors, fontSize } from '../../theme'
import { UserDataContext } from '../../context/UserDataContext'
import { ColorSchemeContext } from '../../context/ColorSchemeContext'
import { sendNotification } from '../../utils/SendNotification'
import { getKilobyteSize } from '../../utils/functions'
import Headerlogo from '../../components/Headerlogo'
import { logo, produk, reservasi } from '../../../assets'
import { pemesanan } from '.'

export default function Reservasi() {
  const navigation = useNavigation()
  const [token, setToken] = useState('')
  const { userData } = useContext(UserDataContext)
  const { scheme } = useContext(ColorSchemeContext)
  const isDark = scheme === 'dark'
  const colorScheme = {
    content: isDark ? styles.darkContent : styles.lightContent,
    text: isDark ? colors.white : colors.primaryText,
  }

  const onCardPress = () => {
    navigation.navigate('pemesanan')
  }

  useEffect(() => {
    console.log('reservasi screen')
  }, [])

  return (
    <ScreenTemplate>
      <Headerlogo />
      <View style={{ alignItems: 'center', paddingVertical: 20 }}>
        <Text
          style={{
            color: colors.warnaFont,
            fontSize: 30,
            textTransform: 'uppercase',
            fontWeight: 'bold',
          }}
        >
          Jenis Perawatan
        </Text>
      </View>
      <View
        style={[
          styles.cardContain,
          {
            paddingHorizontal: 20,
            paddingVertical: 20,
            marginBottom: 20,
            flexDirection: 'row',
            justifyContent: 'space-between',
          },
        ]}
      >
        <View style={{ flexDirection: 'column' }}>
          <Text>Nama Treatment 1</Text>
          <Text>Penjelasan</Text>
          <Text>Harga Treatment</Text>
        </View>
        <TouchableOpacity
          onPress={onCardPress}
          style={{
            borderWidth: 1,
            borderColor: 'black',
            borderRadius: 5,
            padding: 5,
            borderColor: colors.warnaFont,
          }}
        >
          <Text style={{ marginTop: 12, color: colors.warnaFont }}>Pesan</Text>
        </TouchableOpacity>
      </View>
      <View
        style={[
          styles.cardContain,
          {
            paddingHorizontal: 20,
            paddingVertical: 20,
            marginBottom: 20,
            flexDirection: 'row',
            justifyContent: 'space-between',
          },
        ]}
      >
        <View style={{ flexDirection: 'column' }}>
          <Text>Nama Treatment 2</Text>
          <Text>Penjelasan</Text>
          <Text>Harga Treatment</Text>
        </View>
        <TouchableOpacity
          onPress={onCardPress}
          style={{
            borderWidth: 1,
            borderColor: 'black',
            borderRadius: 5,
            padding: 5,
            borderColor: colors.warnaFont,
          }}
        >
          <Text style={{ marginTop: 12, color: colors.warnaFont }}>Pesan</Text>
        </TouchableOpacity>
      </View>
      <View
        style={[
          styles.cardContain,
          {
            paddingHorizontal: 20,
            paddingVertical: 20,
            marginBottom: 20,
            flexDirection: 'row',
            justifyContent: 'space-between',
          },
        ]}
      >
        <View style={{ flexDirection: 'column' }}>
          <Text>Nama Treatment 3</Text>
          <Text>Penjelasan</Text>
          <Text>Harga Treatment</Text>
        </View>
        <TouchableOpacity
          onPress={onCardPress}
          style={{
            borderWidth: 1,
            borderColor: 'black',
            borderRadius: 5,
            padding: 5,
            borderColor: colors.warnaFont,
          }}
        >
          <Text style={{ marginTop: 12, color: colors.warnaFont }}>Pesan</Text>
        </TouchableOpacity>
      </View>
    </ScreenTemplate>
  )
}

const styles = StyleSheet.create({
  cardContain: {
    display: 'flex',
    flexDirection: 'row',
    backgroundColor: colors.grey,
  },

  card: {
    flexDirection: 'column',
    justifyContent: 'center',
    alignItems: 'center',
    padding: 20,
  },
  cardImage: {
    width: '100%', // Sesuaikan ukuran gambar
    height: 200, // Sesuaikan ukuran gambar

    marginBottom: 10,
  },
  cardTitle: {
    fontSize: fontSize.xLarge,
    textAlign: 'center',
    fontWeight: 'bold',
    textTransform: 'uppercase',
  },
  lightContent: {
    backgroundColor: colors.lightyellow,
    padding: 20,
    borderRadius: 5,
    marginTop: 30,
    marginLeft: 30,
    marginRight: 30,
  },
  darkContent: {
    backgroundColor: colors.gray,
    padding: 20,
    borderRadius: 5,
    marginTop: 30,
    marginLeft: 30,
    marginRight: 30,
  },
  main: {
    flex: 1,
    width: '100%',
  },
  title: {
    fontSize: fontSize.xxxLarge,
    marginBottom: 20,
    textAlign: 'center',
  },
  field: {
    fontSize: fontSize.middle,
    textAlign: 'center',
  },
})
